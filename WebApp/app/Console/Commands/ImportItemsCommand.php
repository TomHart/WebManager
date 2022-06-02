<?php

namespace App\Console\Commands;

use App\Action\ImportItemPrice;
use App\Action\ImportItems;
use Illuminate\Console\Command;

class ImportItemsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Items to DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new ImportItems($this->output))->perform();
        (new ImportItemPrice($this->output))->perform();
        return 0;
    }
}
