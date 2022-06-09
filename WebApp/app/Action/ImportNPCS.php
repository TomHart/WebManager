<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\NPC;
use App\Models\NPCAttribute;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\DB;

class ImportNPCS implements ActionInterface
{
    use ParseNumberedIniTrait;

    private OutputStyle $output;

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

    public function perform()
    {
        $npcs = $this->parseIni(resource_path('INI/NPC.ini'));

        $this->importNpcs($npcs);
    }

    private function importNpcs(array $npcs)
    {
        $this->output->writeln('Importing NPCs');
        $bar = $this->output->createProgressBar(count($npcs));
        DB::unprepared('SET IDENTITY_INSERT NPCS ON');
        foreach ($npcs as $id => $npc) {
            $bar->advance();

            NPC::hydrateFromIni($id, $npc);
        }
        DB::unprepared('SET IDENTITY_INSERT NPCS OFF');
        $bar->finish();
        $this->output->writeln(PHP_EOL . 'NPCs Imported');
    }
}
