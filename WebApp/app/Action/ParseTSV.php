<?php

namespace App\Action;

trait ParseTSV
{
    public function parse(string $filename, bool $useFirstRowForIndex = true): array
    {
        $i = 0;
        if (($handle = fopen($filename, 'rb')) === FALSE) {
            dump('Cant open');
            die;
        }

        $allData = array();
        $headers = [];
        while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) {
            if ($i === 0) {
                $i = 1;
                $headers = $data;
                continue;
            }
            // Remove the first iteration as it's not "real" data

            $rowData = [];
            foreach ($data as $index => $value) {
                $index = $headers[$index];
                $rowData[$index] = trim($value);

                if ($value === '') {
                    $rowData[$index] = null;
                }
            }

            if ($useFirstRowForIndex) {
                $allData[$rowData[$headers[0]]] = $rowData;
            } else {
                $allData[] = $rowData;
            }
        }
        fclose($handle);

        return $allData;
    }

    public function keysToColumns(array $data): array
    {
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[strtoupper(str_replace([' ', '.'], ['_', ''], $key))] = $value;
        }

        return $newData;
    }
}
