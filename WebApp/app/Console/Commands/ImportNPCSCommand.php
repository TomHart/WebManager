<?php

namespace App\Console\Commands;

use App\Action\ImportNPCS;
use App\Action\ImportNPCTrades;
use Illuminate\Console\Command;

class ImportNPCSCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:npcs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import NPCS';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ((new ImportNPCS($this->output))->perform());
        ((new ImportNPCTrades($this->output))->perform());
        return 0;
    }
}
