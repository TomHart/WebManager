<?php

namespace App;

trait TranslateTrait {

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