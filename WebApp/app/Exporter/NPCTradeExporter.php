<?php

declare(strict_types=1);

namespace App\Exporter;

use App\Models\NPC;
use Illuminate\Database\Eloquent\Collection;

class NPCTradeExporter
{
    public function export(Collection $npcs)
    {
        return [
            'NPCTradeItemList.txt' => $npcs->map(function (NPC $npc) {
                return $this->exportNpc($npc);
            })->join('')
        ];
    }

    private function exportNpc(NPC $npc)
    {
        $EOL = "\r\n";
        $content = sprintf("Npc\t%d\t<%s> %s%s", $npc->TEMPLATE_ID, $npc->TYPE, $npc->NAME, $EOL);

        $content .= sprintf("Sell\t%d%s", 1, $EOL);
        $content .= sprintf("Buy\t%d%s", 1, $EOL);
        $content .= sprintf("BuyOther\t%d%s", 1, $EOL);

        foreach ($npc->trades as $trade) {
            $content .= sprintf("Item\t%d\t%d%s", $trade->ITEM_ID, $trade->COUNT, $EOL);
        }

        $content .= sprintf("-End%s", $EOL);
        return $content;
    }
}
