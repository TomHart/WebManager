<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\NPC
 *
 * @property int $NPCID
 * @property string $NAME
 * @property string $TYPE
 * @property string $COORDS
 * @property int|null $TEMPLATE_ID
 * @property-read Collection|NPCAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read mixed $trade_count
 * @property-read Collection|NPCTrade[] $trades
 * @property-read int|null $trades_count
 * @method static Builder|NPC newModelQuery()
 * @method static Builder|NPC newQuery()
 * @method static Builder|NPC query()
 * @method static Builder|NPC whereCOORDS($value)
 * @method static Builder|NPC whereNAME($value)
 * @method static Builder|NPC whereNPCID($value)
 * @method static Builder|NPC whereTEMPLATEID($value)
 * @method static Builder|NPC whereTYPE($value)
 * @mixin Eloquent
 * @property int|null $TID
 * @property string|null $DEGREES
 * @property-read Collection|NPCEvent[] $events
 * @property-read int|null $events_count
 * @method static Builder|NPC whereDEGREES($value)
 * @method static Builder|NPC whereTID($value)
 */
class NPC extends Model
{
    use HasFactory;

    protected $table = 'NPCS';
    protected $guarded = [];
    protected $primaryKey = 'NPCID';
    public $timestamps = false;

    public static array $sort = [
        'name' => 'NAME',
        'type' => 'TYPE',
        'trades' => 'trades_count'
    ];

    public static function sortable(): Builder
    {
        return NPC
            ::withCount('trades')
            ->orderBy(self::$sort[request()->query('sort')] ?? 'NAME', request()->query('order', 'asc'));
    }

    public function trades(): HasManyThrough
    {
        return $this
            ->hasManyThrough(NPCTrade::class, NPCEvent::class, 'NPC_ID', 'NPC_ID', 'NPCID', 'TEMPLATE')
            ->where('FUNCTION_ID', 9);
    }

    public function getTradeTemplateIdAttribute(): ?int
    {
        return $this->trades->first()->NPC_ID ?? null;
    }

    public function events(): HasMany
    {
        return $this->hasMany(NPCEvent::class, 'NPC_ID');
    }

    public static function hydrateFromIni(int $id, array $data): ?self
    {
        if (!isset($data['AgpmCharacter'][0])) {
            return null;
        }

        $npc = $data['AgpmCharacter'][0];
        $nameParts = explode('>', $npc['Name']);

        if (stripos($nameParts[0], 'Oracle') === 0 || $nameParts[0] === 'Item Exchange') {
            return null;
        }

        if (count($nameParts) != 2) {
            dump('Invalid name stuff');
            dump($nameParts);
            die;
        }

        $model = self::updateOrCreate(
            ['NPCID' => $id],
            [
                'NAME' => trim($nameParts[1]),
                'TYPE' => trim(str_replace(['<', '>'], '', $nameParts[0])),
                'COORDS' => $npc['Position'],
                'TID' => $npc['TID'],
                'DEGREES' => $npc['Degree']
            ]
        );

        if (isset($data['ApmEventManager'])) {
            foreach ($data['ApmEventManager'] as $event) {
                NPCEvent::hydrateFromIni($id, $event);
            }
        }

        return $model;
    }
}
