<?php

declare(strict_types=1);

namespace App\Exporter;

use App\Models\NPC;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\ArrayShape;

class NPCExporter
{
    #[ArrayShape(['NPC.INI' => "string"])] public function export(Collection $npcs): array
    {
        return [
            'NPC.INI' => $npcs->map(function (NPC $npc) {
                return $this->exportNpc($npc);
            })->join('')
        ];
    }

    private function exportNpc(NPC $npc): string
    {
        $content = sprintf('[%d]%s', $npc->NPCID, WINDOWS_EOL);

        $content .= 'ModuleData1=AgpmCharacter' . WINDOWS_EOL;
        $content .= sprintf('Name=<%s> %s%s', $npc->TYPE, $npc->NAME, WINDOWS_EOL);
        $content .= sprintf('TID=%s%s', $npc->TID, WINDOWS_EOL);
        $content .= sprintf('Position=%s%s', $npc->COORDS, WINDOWS_EOL);
        $content .= sprintf('Degree=%s%s', $npc->DEGREES, WINDOWS_EOL);
        $content .= NPCEventExporter::export($npc->events);
        $content .= sprintf('EnumEnd=0%s', WINDOWS_EOL);
        return $content;
    }
}
