<?php

declare(strict_types=1);

namespace App\Exporter;

use App\Models\NPC;
use Illuminate\Database\Eloquent\Collection;

class NPCExporter
{
    public function export(Collection $npcs)
    {
        return [
            'NPC.INI' => $content = $npcs->map(function (NPC $npc) {
                return $this->exportNpc($npc);
            })->join('')
        ];
    }

    private function exportNpc(NPC $npc)
    {
        $content = sprintf('[%d]%s', $npc->NPCID, PHP_EOL);

        foreach ($npc->attributes as $attribute) {
            $content .= sprintf('%s=%s%s', $attribute->ATTRIBUTE_NAME, $attribute->VALUE, PHP_EOL);
        }
        return $content;
    }
}
