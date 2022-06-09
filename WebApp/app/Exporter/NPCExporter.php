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

        foreach ($npc->attributes as $attribute) {
            $content .= sprintf('%s=%s%s', $attribute->ATTRIBUTE_NAME, $attribute->VALUE, WINDOWS_EOL);
        }
        return $content;
    }
}
