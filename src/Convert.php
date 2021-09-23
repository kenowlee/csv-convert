<?php

namespace Convert;

/**
 * Class CSV
 * @package CSV
 *
 */
class CSV
{
    /**
     * @param string $file
     *
     * @return bool
     */
    public static function exist(string $file): bool
    {
        if (!file_exists($file)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $file
     *
     * @return bool
     */
    public static function isCsv(string $file): bool
    {
        $allowed = [
            'application/vnd.ms-excel',
            'text/plain',
            'text/csv',
            'text/tsv'
        ];
        if (in_array(mime_content_type($file), $allowed)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $file
     * @param string $separator
     *
     * @return string
     */
    public static function toArray(string $file, string $separator = ';')
    {
        if (!self::exist($file)) {
            return 'File not found';
        }

        if (!self::isCsv($file)) {
            return 'File not allowed';
        }

        $opened = fopen($file, "r");

        if ($opened === false) {
            return 'Unable to open file';
        }
        $data = [];
        while (($line = fgetcsv($opened, 1000, $separator)) !== false) {
            if (!empty($line)) {
                $data[] = $line;
            }
        }

        fclose($opened);
        return $data;
    }
}
