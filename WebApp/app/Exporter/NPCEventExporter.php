<?php

declare(strict_types=1);

namespace App\Exporter;

use App\Models\NPCEvent;
use Illuminate\Database\Eloquent\Collection;

class NPCEventExporter
{
    public static function export(Collection $events): string
    {
        return 'ModuleData2=ApmEventManager' . WINDOWS_EOL . $events->map(function (NPCEvent $npc) {
                return self::exportNpcEvent($npc);
            })->join('');
    }

    private static function exportNpcEvent(NPCEvent $npc): string
    {
        $content = '';
        foreach ($npc->attributesToArray() as $key => $value) {
            if ($value === null || !isset(NPCEvent::$columnMap[$key])) {
                continue;
            }
            $content .= sprintf('%s=%s%s', NPCEvent::$columnMap[$key], $value, WINDOWS_EOL);
        }
        return $content;
    }
}
