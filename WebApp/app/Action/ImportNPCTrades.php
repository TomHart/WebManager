<?php

declare(strict_types=1);

namespace App\Action;

use App\Models\NPC;
use App\Models\NPCTrade;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\DB;

class ImportNPCTrades implements ActionInterface
{
    private $output;

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

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
        $this->output->writeln('Importing NPC Trades');
        $bar = $this->output->createProgressBar(count($allTrades));
        NPCTrade::truncate();
        foreach ($allTrades as $trades) {
            $bar->advance();
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
        $bar->finish();
        $this->output->writeln(PHP_EOL . 'NPC Trades Imported');
    }
}
