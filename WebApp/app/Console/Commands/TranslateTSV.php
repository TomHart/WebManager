<?php

namespace App\Console\Commands;

use App\Action\ParseTSV;
use App\TranslateTrait;
use Illuminate\Console\Command;

class TranslateTSV extends Command
{
    use ParseTSV;
    use TranslateTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:tsv {file} {column}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->parse(resource_path('INI/' . $this->argument('file')));
        $newFile = resource_path('INI/' . $this->argument('file') . '.new');
        if(file_exists($newFile)){
            unlink($newFile);
        }
        $output = fopen($newFile, 'w');


        $column = array_keys($data[array_key_first($data)])[$this->argument('column')];

        foreach($data as $tsv){
            $tsv[$column] = $this->translateString($tsv[$column]);
            fputcsv($output, $tsv);
        }

        fclose($output);
        return 0;
    }
}
