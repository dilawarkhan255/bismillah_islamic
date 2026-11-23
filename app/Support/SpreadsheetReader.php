<?php

namespace App\Support;

use RuntimeException;
use SimpleXMLElement;
use ZipArchive;

/**
 * Reads the first sheet of an .xlsx file, or a .csv file, into rows of strings.
 * Small on purpose: no formulas or styles, just the cell values people type.
 * Excel times come back as their raw number (e.g. 0.6875 for 4:30 PM).
 */
class SpreadsheetReader
{
    /** @return array<int, array<int, string>> */
    public static function read(string $path, string $extension): array
    {
        return match (strtolower($extension)) {
            'xlsx' => self::xlsx($path),
            'csv', 'txt' => self::csv($path),
            default => throw new RuntimeException('Please upload an .xlsx or .csv file. (Old .xls files: open in Excel and "Save As" .xlsx.)'),
        };
    }

    private static function csv(string $path): array
    {
        $text = (string) file_get_contents($path);
        $text = preg_replace('/^\xEF\xBB\xBF/', '', $text); // UTF-8 BOM
        if (! mb_check_encoding($text, 'UTF-8')) {
            $text = mb_convert_encoding($text, 'UTF-8', 'Windows-1252');
        }

        $firstLine = strtok($text, "\n") ?: '';
        $delimiter = collect([',', ';', "\t"])->sortByDesc(fn ($d) => substr_count($firstLine, $d))->first();

        $handle = fopen('php://temp', 'r+');
        fwrite($handle, $text);
        rewind($handle);

        $rows = [];
        while (($row = fgetcsv($handle, 0, $delimiter, '"', '')) !== false) {
            $rows[] = array_map(fn ($v) => trim((string) $v), $row);
        }
        fclose($handle);

        return $rows;
    }

    private static function xlsx(string $path): array
    {
        $zip = new ZipArchive();
        if ($zip->open($path) !== true) {
            throw new RuntimeException('This file could not be opened as an Excel (.xlsx) file.');
        }

        try {
            $shared = [];
            if (($xml = $zip->getFromName('xl/sharedStrings.xml')) !== false) {
                foreach (self::xml($xml)->si as $si) {
                    $shared[] = self::text($si);
                }
            }

            $sheetXml = $zip->getFromName(self::firstSheetPath($zip));
            if ($sheetXml === false) {
                throw new RuntimeException('The Excel file has no sheet.');
            }

            $rows = [];
            foreach (self::xml($sheetXml)->sheetData->row as $row) {
                $cells = [];
                foreach ($row->c as $c) {
                    $col = self::columnIndex((string) $c['r']);
                    $type = (string) $c['t'];
                    $value = match ($type) {
                        's' => $shared[(int) $c->v] ?? '',
                        'inlineStr' => self::text($c->is),
                        'b' => ((string) $c->v) === '1' ? 'TRUE' : 'FALSE',
                        default => (string) $c->v,
                    };
                    $cells[$col ?? count($cells)] = trim($value);
                }
                if ($cells) {
                    $filled = array_fill(0, max(array_keys($cells)) + 1, '');
                    $rows[] = array_replace($filled, $cells);
                }
            }

            return $rows;
        } finally {
            $zip->close();
        }
    }

    private static function firstSheetPath(ZipArchive $zip): string
    {
        $workbook = $zip->getFromName('xl/workbook.xml');
        $rels = $zip->getFromName('xl/_rels/workbook.xml.rels');
        if ($workbook === false || $rels === false) {
            return 'xl/worksheets/sheet1.xml';
        }

        $wb = self::xml($workbook);
        $sheet = $wb->sheets->sheet[0] ?? null;
        $rid = $sheet ? (string) $sheet->attributes('http://schemas.openxmlformats.org/officeDocument/2006/relationships')['id'] : '';

        foreach (self::xml($rels)->Relationship as $rel) {
            if ((string) $rel['Id'] === $rid) {
                $target = ltrim((string) $rel['Target'], '/');

                return str_starts_with($target, 'xl/') ? $target : 'xl/' . $target;
            }
        }

        return 'xl/worksheets/sheet1.xml';
    }

    private static function xml(string $xml): SimpleXMLElement
    {
        $doc = simplexml_load_string($xml, SimpleXMLElement::class, LIBXML_NONET);
        if ($doc === false) {
            throw new RuntimeException('The Excel file looks damaged.');
        }

        return $doc;
    }

    /** Text of a shared/inline string, including rich-text runs. */
    private static function text(?SimpleXMLElement $node): string
    {
        if (! $node) {
            return '';
        }
        if (isset($node->t)) {
            return (string) $node->t;
        }

        $out = '';
        foreach ($node->r as $run) {
            $out .= (string) $run->t;
        }

        return $out;
    }

    /** "C7" => 2 */
    private static function columnIndex(string $ref): ?int
    {
        if (! preg_match('/^([A-Z]+)/', $ref, $m)) {
            return null;
        }

        $n = 0;
        foreach (str_split($m[1]) as $ch) {
            $n = $n * 26 + (ord($ch) - 64);
        }

        return $n - 1;
    }
}
