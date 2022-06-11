<?php

namespace App\Action;

use App\Models\CharacterType;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\ProgressBar;

class ImportCharacters implements ActionInterface
{
    use ParseTSV;

    private OutputStyle $output;
    private ProgressBar $bar;

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

    public function perform()
    {
        $data = $this->parse(resource_path('INI/CharacterDataTable.txt'));
        $this->bar = $this->output->createProgressBar(count($data));
        $this->bar->start();
        DB::unprepared('SET IDENTITY_INSERT CHARACTERS ON');
        array_map([$this, 'importCharacter'], $data);
        DB::unprepared('SET IDENTITY_INSERT CHARACTERS OFF');
        $this->bar->finish();
        $this->output->writeln('');
    }

    private function importCharacter(array $characterData)
    {
        $this->bar->advance();
        if ($this->isNotEnglish($characterData['Name'])) {
            $characterData['Name'] = $this->translateString($characterData['Name']);
        }

        $characterData = $this->keysToColumns($characterData);

        CharacterType::updateOrCreate(
            ['TID' => $characterData['TID']],
            $characterData
        );
    }

    private function isNotEnglish(string $string): bool
    {
        return (strlen($string) !== strlen(utf8_decode($string)));
    }

    private function translateString(string $string, string $from = 'ko'): ?string
    {
        $data = [
            'q' => $string,
            'source' => $from,
            'target' => 'en',
            'format' => 'text',
        ];

        $payload = json_encode($data);

        // Prepare new cURL resource
        $crl = curl_init('http://libretranslate:5000/translate');
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($crl, CURLINFO_HEADER_OUT, true);
        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $payload);

        // Set HTTP Header for POST request
        curl_setopt($crl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        ]);

        // Submit the POST request
        $result = curl_exec($crl);

        if (!$result) {
            return $string;
        }

        $json = json_decode($result);
        // Close cURL session handle
        curl_close($crl);

        return $json->translatedText ?? $string;
    }
}
