<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\Item;
use App\Models\ItemAttribute;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\OutputStyle;
use Exception;
use Illuminate\Support\Collection;

class ImportItemPrice implements ActionInterface
{
    private $output;
    private $file = 'INI/ITEMDATATABLE.txt';

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

    public function perform()
    {
        $items = $this->getItems();

        $itemIds = new Collection(array_keys($items));
        $itemModels = $itemIds
            ->chunk('2000')
            ->map(static function ($ids) {
                return Item::whereIn('id', $ids)->get();
            })
            ->flatten()
            ->keyBy('id');

        foreach ($items as $itemId => $item) {
            if (!isset($itemModels[$itemId])) {
                dump("Skipping $itemId");
                continue;
            }
            $itemModels[$itemId]->PRICE = (int)$item[20] ?? null;
            $itemModels[$itemId]->save();
        }
    }

    private function getItems()
    {
        $i = 0;
        if (($handle = fopen(resource_path($this->file), 'rb')) === FALSE) {
            dump('Cant open');
            die;
        }

        $allData = array();
        while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) {
            if ($i === 0) {
                $i = 1;
                continue;
            }
            // Remove the first iteration as it's not "real" datas

            $allData[(int)$data[0]] = $data;
        }
        fclose($handle);

        return $allData;
    }
}
