<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemAttribute;
use App\Models\ItemOption;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemImportController extends Controller
{
    public function showImportForm()
    {
        return view('test-layout');
    }

    public function importItems()
    {
        ini_set('max_execution_time', -1);
        ini_set('memory_limit', -1);
        $str = file_get_contents(__DIR__ . '/itemtemplateall.ini');
        $items = preg_split('/(\[[0-9]+\])\r/', $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        //dump(count($items));die;
        $this->importAttributes(array_shift($items));
        $data = [];
        $items = $this->formatItems($items);

        $this->importItemsToDB($items);
    }

    private function importAttributes(string $attributes)
    {
        $attributes = parse_ini_string($attributes);

        DB::unprepared('SET IDENTITY_INSERT ITEMATTRIBUTESLIST ON');
        foreach ($attributes as $id => $name) {
            $attr = ItemAttribute::updateOrCreate(
                ['id' => $id],
                ['ATTRIBUTENAME' => $name]
            );
        }
        DB::unprepared('SET IDENTITY_INSERT ITEMATTRIBUTESLIST OFF');
    }

    private function formatItems(array $items)
    {
        $newItems = [];
        $items = array_chunk($items, 2);
        foreach ($items as $values) {
            try {
                $itemId = (int)str_replace(['[', ']'], '', $values[0]);

                if (array_key_exists($itemId, $newItems)) {
                    dump($itemId, $values);
                    die;
                }

                $newItems[$itemId] = parse_ini_string($values[1], true, INI_SCANNER_RAW);
            } catch (Exception $e) {
                dump($e);
                dump($values[1]);
            }
        }

        return $newItems;
    }

    private function importItemsToDB(array $items)
    {

        $attrs = ItemAttribute::all()->keyBy('id');
        DB::unprepared('SET IDENTITY_INSERT ITEMS ON');
        DB::beginTransaction();
        foreach ($items as $id => $attributes) {
            $item = Item::updateOrCreate(
                ['id' => $id],
                ['ITEMNAME' => $attributes[1]]
            );

            $item->attributes()->delete();
            foreach ($attributes as $id => $value) {
                $item->attributes()->save($attrs[$id], ['VALUE' => $value]);
            }
        }
        DB::commit();
        DB::unprepared('SET IDENTITY_INSERT ITEMS OFF');
    }

    // public function getImages()
    // {
    //     ini_set('max_execution_time', -1);
    //     $items = Item::all();
    //     foreach ($items as $item) {
    //         $file = __DIR__ . '/img/' . $item->id . '.jpg';
    //         if (file_exists($file)) {
    //             continue;
    //         }

    //         try {
    //             file_put_contents($file, file_get_contents('http://www.archlord.drwx.eu/php4img_item.php?i=' . $item->id));
    //         } catch (Exception $e) {
    //             dump($e->getMessage());
    //         }
    //     }

    //     dump($items->count());
    // }


    public function importOptions(){
        $file = fopen(__DIR__ . '/itemoptiontable2.txt', 'rb');
        DB::unprepared('SET IDENTITY_INSERT ITEMOPTIONS ON');
        while(!feof($file)) {
            $line = fgets($file);
            $csv= str_getcsv($line, "\t");
            if(!isset($csv[0], $csv[1])){
                dump($csv);
                continue;
            }
            ItemOption::updateOrCreate(['id' => (int)$csv[0]], ['DESCRIPTION' => $csv[1]]);
         }
         DB::unprepared('SET IDENTITY_INSERT ITEMOPTIONS OFF');

        fclose($file);
    }
}
