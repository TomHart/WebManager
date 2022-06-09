<?php

declare(strict_types=1);

namespace App\Exporter;

use App\Models\NPC;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\ArrayShape;

class NPCTradeExporter
{
    #[ArrayShape(['NPCTradeItemList.txt' => "string"])] public function export(Collection $npcs): array
    {
        return [
            'NPCTradeItemList.txt' => $npcs->map(function (NPC $npc) {
                return $this->exportNpc($npc);
            })->join('')
        ];
    }

    private function exportNpc(NPC $npc): string
    {
        $content = sprintf("Npc\t%d\t<%s> %s%s", $npc->TEMPLATE_ID, $npc->TYPE, $npc->NAME, WINDOWS_EOL);

        $content .= sprintf("Sell\t%d%s", 1, WINDOWS_EOL);
        $content .= sprintf("Buy\t%d%s", 1, WINDOWS_EOL);
        $content .= sprintf("BuyOther\t%d%s", 1, WINDOWS_EOL);

        foreach ($npc->trades as $trade) {
            $content .= sprintf("Item\t%d\t%d%s", $trade->ITEM_ID, $trade->COUNT, WINDOWS_EOL);
        }

        $content .= sprintf("-End%s", WINDOWS_EOL);
        return $content;
    }
}
