<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OptimizeImages extends Command
{
    protected $signature = 'app:optimize-images {--quality=72} {--max-width=1100}';
    protected $description = 'Resize, compress images and convert oversized PNGs to JPEG';

    public function handle(): int
    {
        $dir = public_path('img');
        $quality = (int) $this->option('quality');
        $maxWidth = (int) $this->option('max-width');

        $dirs = [public_path('img'), public_path('storage')];
        $files = collect();
        foreach ($dirs as $d) {
            if (!is_dir($d)) continue;
            $files = $files->merge(collect(File::allFiles($d))->filter(fn($f) =>
                in_array(strtolower($f->getExtension()), ['jpg','jpeg','png']) &&
                $f->getFilename() !== 'logo.png'
            ));
        }

        $this->info("Processing {$files->count()} images...");
        $this->newLine();

        $totalBefore = 0;
        $totalAfter = 0;

        foreach ($files as $file) {
            $before = $file->getSize();
            $totalBefore += $before;
            $path = $file->getPathname();

            try {
                $info = @getimagesize($path);
                if (!$info) { $totalAfter += $before; continue; }

                $isPng = ($info[2] === IMAGETYPE_PNG);
                $origW = $info[0];
                $origH = $info[1];

                $img = $isPng ? @imagecreatefrompng($path) : @imagecreatefromjpeg($path);
                if (!$img) { $totalAfter += $before; continue; }

                $needsResize = ($origW > $maxWidth);
                $newW = $needsResize ? $maxWidth : $origW;
                $newH = $needsResize ? (int) round($origH * ($maxWidth / $origW)) : $origH;

                if ($needsResize) {
                    $resized = imagecreatetruecolor($newW, $newH);
                    if ($isPng) {
                        imagealphablending($resized, false);
                        imagesavealpha($resized, true);
                    }
                    imagecopyresampled($resized, $img, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
                    imagedestroy($img);
                    $img = $resized;
                }

                // Convert large PNGs to JPEG for massive savings
                $convertToJpeg = ($isPng && $before > 100000);

                if ($convertToJpeg) {
                    $newPath = substr($path, 0, -4) . '.jpg';
                    imagejpeg($img, $newPath, $quality);
                    imagedestroy($img);
                    unlink($path);
                    $after = filesize($newPath);
                } else {
                    if ($isPng) {
                        imagepng($img, $path, 9);
                    } else {
                        imagejpeg($img, $path, $quality);
                    }
                    imagedestroy($img);
                    $after = filesize($path);
                }

                $totalAfter += $after;
                $saved = $before > 0 ? round((1 - $after / $before) * 100) : 0;

                if ($saved > 5) {
                    $this->line("  <info>{$file->getFilename()}</info>: " . $this->fmt($before) . " -> " . $this->fmt($after) . " (-{$saved}%)");
                }
            } catch (\Exception $e) {
                $totalAfter += $before;
            }
        }

        $this->newLine();
        $this->info("Before: " . $this->fmt($totalBefore));
        $this->info("After:  " . $this->fmt($totalAfter));
        $this->info("Saved:  " . $this->fmt($totalBefore - $totalAfter));

        return self::SUCCESS;
    }

    protected function fmt(int $b): string
    {
        return $b >= 1048576 ? round($b / 1048576, 1) . ' MB' : round($b / 1024) . ' KB';
    }
}
