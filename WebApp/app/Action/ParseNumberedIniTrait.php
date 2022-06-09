<?php

declare(strict_types=1);

namespace App\Action;

use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait ParseNumberedIniTrait
{
    /**
     * @throws FileNotFoundException
     */
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

                $newItems[$itemId] = $this->parseIniContent($values[1]);
            } catch (Exception $e) {
                dump($e->getMessage());
                dump($values[1]);
                die;
            }
        }

        return $newItems;
    }

    /**
     * @throws FileNotFoundException
     */
    private function assertFileExists($file): void
    {
        if (!file_exists($file)) {
            throw new FileNotFoundException("$file not found");
        }
    }

    /**
     * @throws FileNotFoundException
     */
    private function getFileContents($file): array|bool
    {
        $this->assertFileExists($file);
        return array_filter(preg_split('/(\[\d+])\r/', file_get_contents($file), -1, PREG_SPLIT_DELIM_CAPTURE));
    }

    private function parseIniContent(string $content): array
    {
        $content = trim(mb_convert_encoding($content, 'UTF-8', 'UTF-8'));
        $lines = array_filter(explode(WINDOWS_EOL, $content));

        $data = [];
        $subKey = null;

        $subKeyFirstLines = [];
        $subKeyIndex = 0;

        foreach ($lines as $line) {
            $parts = $this->splitOnFirstOccurrence($line, '=');
            if (str_starts_with($parts[0], 'ModuleData')) {
                $subKey = $parts[1];
                $data[$subKey] = [];
                $subKeyIndex = 0;
                continue;
            }

            if (!isset($subKeyFirstLines[$subKey])) {
                $subKeyFirstLines[$subKey] = $parts[0];
            } elseif ($subKeyFirstLines[$subKey] === $parts[0]) {
                $subKeyIndex++;
            }

            $data[$subKey][$subKeyIndex][$parts[0]] = $parts[1];
        }

        return $data;
    }

    private function splitOnFirstOccurrence(string $string, string $delim): array
    {
        $strPos = strpos($string, $delim);

        return [
            substr($string, 0, $strPos),
            substr($string, ++$strPos)
        ];
    }
}
