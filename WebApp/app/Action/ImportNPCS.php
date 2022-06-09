<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\NPC;
use App\Models\NPCAttribute;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\DB;

class ImportNPCS implements ActionInterface
{
    use ParseIniTrait;

    private $output;

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
            $nameParts = explode('>', $npc['Name']);

            if (stripos($nameParts[0], 'Oracle') === 0 || $nameParts[0] === 'Item Exchange') {
                continue;
            }

            if (count($nameParts) != 2) {
                dump('Invalid name stuff');
                dump($nameParts);
                die;
            }

            $npcModel = NPC::updateOrCreate(
                ['NPCID' => $id],
                [
                    'NAME' => trim($nameParts[1]),
                    'TYPE' => trim(str_replace(['<', '>'], '', $nameParts[0])),
                    'COORDS' => $npc['Position'],
                    'TEMPLATE_ID' => $npc['Template'] ?? null
                ]
            );

            $npcModel->attributes()->delete();
            foreach ($npc as $name => $value) {
                $attrModel = new NPCAttribute([
                    'ATTRIBUTE_NAME' => $name,
                    'VALUE' => $value
                ]);

                $npcModel->attributes()->save($attrModel);
            }
        }
        DB::unprepared('SET IDENTITY_INSERT NPCS OFF');
        $bar->finish();
        $this->output->writeln(PHP_EOL . 'NPCs Imported');
    }
}
