<?php

namespace Convert;

use RuntimeException;

/**
 * Class CSV
 * @package CSV
 *
 */
class CSV
{
    private const _allowed_mime_types = [
        'application/vnd.ms-excel',
        'text/plain',
        'text/csv',
        'text/tsv'
    ];

    /**
     * @param string $file
     *
     * @return bool
     */
    private static function _isCsv(string $file): bool
    {
        return in_array(mime_content_type($file), self::_allowed_mime_types);
    }

    /**
     * @param string $file
     * @param string $separator
     * @throws RuntimeException
     * @return array
     */
    public static function toArray(string $file, string $separator = ';'): array
    {
        if (empty($file)) {
            throw new RuntimeException('Invalid File');
        }

        if (!file_exists($file)) {
            throw new RuntimeException('File not found');
        }

        if (!self::_isCsv($file)) {
            throw new RuntimeException('File not allowed');
        }

        $opened = fopen($file, 'r');

        if ($opened === false) {
            throw new RuntimeException('Unable to open file');
        }

        $data = [];

        $line = fgetcsv($opened, 1000, $separator);
        
        while ($line !== false) {
            if (empty($line)) {
                continue;
            }
            $data[] = $line;
            $line = fgetcsv($opened, 1000, $separator);
        }

        fclose($opened);
        return $data;
    }
}
