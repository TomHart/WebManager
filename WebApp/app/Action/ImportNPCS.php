<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\NPC;
use Illuminate\Support\Facades\DB;

class ImportNPCS implements ActionInterface
{
    use ParseIniTrait;

    public function perform()
    {
        $npcs = $this->parseIni(resource_path('INI/NPC.ini'));

        $this->importNpcs($npcs);
    }

    private function importNpcs(array $npcs){
        DB::unprepared('SET IDENTITY_INSERT NPCS ON');
        foreach ($npcs as $id => $npc) {

            $nameParts = explode('>', $npc['Name']);

            if(stripos($nameParts[0], 'Oracle') === 0 || $nameParts[0] === 'Item Exchange'){
                continue;
            }

            if(count($nameParts) != 2){
                dump('Invalid name stuff');
                dump($nameParts);
                die;
            }

            $attr = NPC::updateOrCreate(
                ['NPCID' => $id],
                [
                    'NAME' => trim($nameParts[1]),
                    'TYPE' => trim(str_replace(['<', '>'], '', $nameParts[0])),
                    'COORDS' => $npc['Position'],
                    'TEMPLATE_ID' => $npc['Template'] ?? null
                ]
            );
        }
        DB::unprepared('SET IDENTITY_INSERT NPCS OFF');
    }
}
