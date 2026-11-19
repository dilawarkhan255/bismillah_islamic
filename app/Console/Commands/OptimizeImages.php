<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Shrinks oversized photos in storage/app/public so pages load fast.
 *
 *   php artisan images:optimize            (dry run: shows what would change)
 *   php artisan images:optimize --apply    (does it; originals copied to storage/app/image-originals first)
 *
 * File names and formats never change, so no links break. A file is only replaced
 * when the new version is at least 10% smaller. Safe to run again after new uploads.
 */
class OptimizeImages extends Command
{
    protected $signature = 'images:optimize {--apply : Actually replace the files} {--max=1600 : Longest side in pixels} {--quality=80 : JPEG quality}';

    protected $description = 'Resize and compress large images in storage/app/public (keeps a backup of originals)';

    public function handle(): int
    {
        $root = storage_path('app/public');
        $backupRoot = storage_path('app/image-originals');
        $max = (int) $this->option('max');
        $quality = (int) $this->option('quality');
        $apply = (bool) $this->option('apply');

        $files = collect(File::allFiles($root))
            ->filter(fn ($f) => in_array(strtolower($f->getExtension()), ['jpg', 'jpeg', 'png'], true))
            ->filter(fn ($f) => $f->getSize() > 200 * 1024);

        $before = $after = 0;
        $changed = 0;
        $rows = [];

        foreach ($files as $file) {
            $path = $file->getPathname();
            $size = $file->getSize();
            $ext = strtolower($file->getExtension());

            try {
                $img = $this->load($path, $ext);
            } catch (\Throwable $e) {
                $rows[] = [$file->getRelativePathname(), $this->kb($size), '-', 'skipped: ' . $e->getMessage()];
                continue;
            }
            if (! $img) {
                $rows[] = [$file->getRelativePathname(), $this->kb($size), '-', 'skipped: unreadable'];
                continue;
            }

            [$w, $h] = [imagesx($img), imagesy($img)];
            $scale = min(1, $max / max($w, $h));
            if ($scale < 1) {
                $nw = (int) round($w * $scale);
                $nh = (int) round($h * $scale);
                $resized = imagecreatetruecolor($nw, $nh);
                if ($ext === 'png') {
                    imagealphablending($resized, false);
                    imagesavealpha($resized, true);
                }
                imagecopyresampled($resized, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);
                imagedestroy($img);
                $img = $resized;
            }

            ob_start();
            if ($ext === 'png') {
                imagesavealpha($img, true);
                imagepng($img, null, 9);
            } else {
                imageinterlace($img, true);          // progressive: shows a preview while loading
                imagejpeg($img, null, $quality);
            }
            $data = ob_get_clean();
            imagedestroy($img);

            $newSize = strlen($data);
            $before += $size;

            if ($newSize > $size * 0.9) {
                $after += $size;
                continue;                             // not worth it, leave the original
            }

            $after += $newSize;
            $changed++;
            $rows[] = [$file->getRelativePathname(), $this->kb($size), $this->kb($newSize), "{$w}x{$h}" . ($scale < 1 ? ' → ' . round($w * $scale) . 'x' . round($h * $scale) : '')];

            if ($apply) {
                $backup = $backupRoot . DIRECTORY_SEPARATOR . $file->getRelativePathname();
                if (! File::exists($backup)) {         // never overwrite an earlier, truly original backup
                    File::ensureDirectoryExists(dirname($backup));
                    File::copy($path, $backup);
                }
                File::put($path, $data);
            }
        }

        $this->table(['File', 'Before', 'After', 'Size (px)'], $rows);
        $this->info(sprintf('%d of %d large images %s: %s → %s (saved %s)',
            $changed, $files->count(), $apply ? 'optimized' : 'would be optimized',
            $this->mb($before), $this->mb($after), $this->mb($before - $after)));
        if (! $apply) {
            $this->comment('Dry run. Run again with --apply to replace the files.');
        } else {
            $this->comment('Originals backed up to storage/app/image-originals');
        }

        return self::SUCCESS;
    }

    /**
     * Loads an image by its REAL format (some ".jpg" files here are really PNG or WebP data)
     * and turns phone photos the right way up (EXIF orientation).
     * The result is saved in the format the file name says, so .jpg files become real JPEGs.
     */
    private function load(string $path, string $ext)
    {
        $mime = @getimagesize($path)['mime'] ?? null;

        if ($mime === 'image/png') {
            $img = @imagecreatefrompng($path);
            if ($img && $ext !== 'png') {
                // Flatten any transparency onto white before it becomes a JPEG.
                $flat = imagecreatetruecolor(imagesx($img), imagesy($img));
                imagefill($flat, 0, 0, imagecolorallocate($flat, 255, 255, 255));
                imagecopy($flat, $img, 0, 0, 0, 0, imagesx($img), imagesy($img));
                imagedestroy($img);
                $img = $flat;
            }
            return $img;
        }
        if ($mime === 'image/webp') {
            return @imagecreatefromwebp($path);
        }
        if ($mime !== 'image/jpeg') {
            throw new \RuntimeException('unknown format ' . ($mime ?? '?'));
        }

        $img = @imagecreatefromjpeg($path);
        if ($img && function_exists('exif_read_data')) {
            $exif = @exif_read_data($path);
            $angle = match ((int) ($exif['Orientation'] ?? 1)) {
                3 => 180, 6 => -90, 8 => 90, default => 0,
            };
            if ($angle !== 0) {
                $rotated = imagerotate($img, $angle, 0);
                imagedestroy($img);
                $img = $rotated;
            }
        }

        return $img;
    }

    private function kb(int $b): string { return round($b / 1024) . ' KB'; }
    private function mb(int $b): string { return round($b / 1048576, 1) . ' MB'; }
}
