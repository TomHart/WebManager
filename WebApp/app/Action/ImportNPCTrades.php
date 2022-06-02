<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\NPC;
use App\Models\NPCTrade;
use Illuminate\Support\Facades\DB;

class ImportNPCTrades implements ActionInterface
{
    public function perform()
    {
        $content = file_get_contents(resource_path('INI/NPCTradeItemList.txt'));
        $npcs = array_filter(preg_split('/-End\tList-\tNpc\t\/\/\t\/\/\t\/\/\r\n/', $content, -1, PREG_SPLIT_DELIM_CAPTURE));

        $trades = array_map([$this, 'parseTrades'], $npcs);
        $this->importTrades($trades);
    }

    private function parseTrades(string $trades)
    {
        $trades = array_filter(array_map(static function (string $line) {
            if (stripos($line, 'Item') !== 0 && stripos($line, 'Npc') !== 0) {
                return null;
            }

            $parts = explode("\t", $line);
            return [
                $parts[0],
                (int)$parts[1],
                (int)$parts[2]
            ];
        }, explode(PHP_EOL, $trades)));

        return $trades;
    }

    private function importTrades(array $allTrades)
    {
        DB::raw('TRUNCATE TABLE NPCTRADES');
        foreach ($allTrades as $trades) {
            if (!isset($trades[0][0]) || $trades[0][0] !== 'Npc') {
                dump('No template ID');
                die;
            }

            $templateId = array_shift($trades)[1];

            foreach ($trades as $trade) {
                $tradeModel = new NPCTrade([
                    'NPC_ID' => $templateId,
                    'ITEM_ID' => $trade[1],
                    'COUNT' => $trade[2]
                ]);
                $tradeModel->save();
            }
        }
    }
}
