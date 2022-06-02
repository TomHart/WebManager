<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\Item;
use App\Models\ItemAttribute;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\OutputStyle;
use Exception;

class ImportItems implements ActionInterface
{
    private $output;
    private $file = 'INI/itemtemplateall.ini';

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

    public function perform()
    {
        $this->assertFileExists();
        $items = $this->getFileContents();

        $this->importAttributes(array_shift($items));

        $items = $this->formatItems($items);

        $this->importItemsToDB($items);
    }

    private function assertFileExists()
    {
        $this->output->writeln("Checking for $this->file");
        if (!file_exists(resource_path($this->file))) {
            throw new FileNotFoundException("resources/$this->file not found");
        }
    }

    private function getFileContents()
    {
        $this->output->writeln('Getting file contents');
        return preg_split('/(\[[0-9]+\])\r/', file_get_contents(resource_path($this->file)), -1, PREG_SPLIT_DELIM_CAPTURE);
    }

    private function importAttributes(string $attributes)
    {
        $this->output->writeln('Importing attributes');
        $attributes = parse_ini_string($attributes);

        DB::unprepared('SET IDENTITY_INSERT ITEMATTRIBUTESLIST ON');
        foreach ($attributes as $id => $name) {
            $this->output->writeln("\tImporting $name ID ($id)");
            $attr = ItemAttribute::updateOrCreate(
                ['id' => $id],
                ['ATTRIBUTENAME' => $name]
            );
        }
        DB::unprepared('SET IDENTITY_INSERT ITEMATTRIBUTESLIST OFF');
    }

    private function formatItems(array $items)
    {
        $this->output->writeln('Formatting items');
        $newItems = [];
        $items = array_chunk($items, 2);
        foreach ($items as $values) {
            try {
                $itemId = (int)str_replace(['[', ']'], '', $values[0]);

                if (array_key_exists($itemId, $newItems)) {
                    dump($itemId, $values);
                    die;
                }

                $newItems[$itemId] = parse_ini_string(mb_convert_encoding($values[1], 'UTF-8', 'UTF-8'), true, INI_SCANNER_RAW);
            } catch (Exception $e) {
                dump($e);
                dump($values[1]);
                die;
            }
        }

        return $newItems;
    }

    private function importItemsToDB(array $items)
    {
        $this->output->writeln('Importing items');
        $progressBar = $this->output->createProgressBar(count($items));
        $progressBar->start();
        $attrs = ItemAttribute::all()->keyBy('id');
        DB::unprepared('SET IDENTITY_INSERT ITEMS ON');
        foreach ($items as $id => $attributes) {
            try {
                $item = Item::updateOrCreate(
                    ['id' => $id],
                    ['ITEMNAME' => mb_convert_encoding($attributes[1], 'UTF-8', 'UTF-8')]
                );

                $item->attributes()->detach();
                foreach ($attributes as $id => $value) {
                    $item->attributes()->save($attrs[$id], ['VALUE' => mb_convert_encoding($value, 'UTF-8', 'UTF-8')]);
                }
            } catch (Exception $e) {
                dump($id, $e);
            } finally {
                $progressBar->advance();
            }
        }
        DB::unprepared('SET IDENTITY_INSERT ITEMS OFF');
        $progressBar->finish();
    }
}
