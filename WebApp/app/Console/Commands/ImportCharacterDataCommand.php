<?php

namespace App\Console\Commands;

use App\Action\ImportCharacters;
use Illuminate\Console\Command;

class ImportCharacterDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:characters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import character data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        ((new ImportCharacters($this->output))->perform());
        return 0;
    }
}
