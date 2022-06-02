<?php

declare(strict_types=1);

namespace App\Action;

use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait ParseIniTrait
{
    private function parseIni(string $fileName)
    {
        $items = $this->getFileContents($fileName);
        $newItems = [];
        $items = array_chunk($items, 2);
        foreach ($items as $values) {
            try {
                $itemId = (int)str_replace(['[', ']'], '', $values[0]);

                if (array_key_exists($itemId, $newItems)) {
                    dump('Key already exists');
                    dump($itemId, $values);
                    die;
                }

                $newItems[$itemId] = parse_ini_string(mb_convert_encoding($values[1], 'UTF-8', 'UTF-8'), true, INI_SCANNER_RAW);
            } catch (Exception $e) {
                dump($e->getMessage());
                dump($values[1]);
                die;
            }
        }

        return $newItems;
    }

    private function assertFileExists($file)
    {
        if (!file_exists($file)) {
            throw new FileNotFoundException("$file not found");
        }
    }

    private function getFileContents($file)
    {
        $this->assertFileExists($file);
        return array_filter(preg_split('/(\[[0-9]+\])\r/', file_get_contents($file), -1, PREG_SPLIT_DELIM_CAPTURE));
    }
}
