<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;

class ItemImportController extends Controller
{
    public function showImportForm()
    {
        return view('test-layout');
    }

    public function importItems()
    {
        $content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'npctradeitemlist.txt');

        $ctx = hash_init('md5', 0, '1111');
        hash_update($ctx, $content);
        $final = hash_final($ctx);
        $key = $this->cryptoDeriveKey($final);
        dump($key);
        $count = count($key);
        $maxchars = 2;
        $newKey = '';
        for ($i = 0; $i < $count; $i++) {
            $newKey .= str_pad(dechex($key[$i]), $maxchars, "0", STR_PAD_LEFT);
        }

        $opts = OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING;
        //Convert key hex string to a string for openssl_decrypt
        //Leave it as it is for openssl command line.
        $key = $this->hexToStr($newKey);
        $cipher = 'rc4-hmac-md5';
        $encrypted = $content;
        foreach (openssl_get_cipher_methods() as $cipher) {
            try {
                $decrypted = openssl_decrypt($encrypted, $cipher, $key, $opts);

                dump($decrypted);
            } catch (Exception $e) {
                dump($e->getMessage());
            }
        }
    }

    function cryptoDeriveKey($key)
    {

        //Put the hash key into an array
        $hashKey1 = str_split($key, 2);
        $count = count($hashKey1);
        $hashKeyInt = array();

        for ($i = 0; $i < $count; $i++) {
            $hashKeyInt[$i] = hexdec($hashKey1[$i]);
        }
        $hashKey = $hashKeyInt;

        //Let n be the required derived key length, in bytes.  CALG_RC4 = 40 bits key or 88 salt bytes
        $n = 40 / 8;

        //Let k be the length of the hash value that is represented by the input parameter hBaseData
        $k = 16;

        //Step 1 Form a 64-byte buffer by repeating the constant 0x36 64 times
        $arraya = array_fill(0, 64, 0x36);

        //Set the first k bytes of the buffer to the result of an XOR operation of the first k bytes of the buffer with the hash value
        for ($i = 0; $i < $k; $i++) {
            $arraya[$i] = $arraya[$i] ^ $hashKey[$i];
        }

        //Hash the result of step 1 by using the same hash algorithm as hBaseData
        $arrayPacka = pack('c*', ...$arraya);
        $hashArraya = md5($arrayPacka);

        //Put the hash string back into the array
        $hashKeyArraya = str_split($hashArraya, 2);
        $count = count($hashKeyArraya);
        $hashKeyInta = array();
        for ($i = 0; $i < $count; $i++) {
            $hashKeyInta[$i] = hexdec($hashKeyArraya[$i]);
        }

        //Step 2 Form a 64-byte buffer by repeating the constant 0x5C 64 times.
        $arrayb = array_fill(0, 64, 0x5C);

        //Set the first k bytes of the buffer to the result of an XOR operation of the first k bytes of the buffer with the hash value
        for ($i = 0; $i < $k; $i++) {
            $arrayb[$i] =  $arrayb[$i] ^ $hashKey[$i];
        }

        //Hash the result of step 2 by using the same hash algorithm as hBaseData
        $arrayPackb = pack('c*', ...$arrayb);
        $hashArrayb = md5($arrayPackb);

        //Put the hash string back into the array
        $hashKeyArrayb = str_split($hashArrayb, 2);
        $count = count($hashKeyArrayb);
        $hashKeyIntb = array();
        for ($i = 0; $i < $count; $i++) {
            $hashKeyIntb[$i] = hexdec($hashKeyArrayb[$i]);
        }

        //Concatenate the result of step 3 with the result of step 4.
        $combined = array_merge($hashKeyInta, $hashKeyIntb);

        //Use the first n bytes of the result of step 5 as the derived key.
        $finalKey = array();
        for ($i = 0; $i < $n; $i++) {
            $finalKey[$i] =  $combined[$i];
        }
        $key = $finalKey;

        return $key;
    }
    function hexToStr($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }
}
