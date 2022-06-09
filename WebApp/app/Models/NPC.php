<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 */
class NPC extends Model
{
    use HasFactory;

    protected $table = "NPCS";
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

    public function trades(): HasMany
    {
        return $this->hasMany(NPCTrade::class, 'NPC_ID', 'TEMPLATE_ID');
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(NPCAttribute::class, 'NPC_ID');
    }
}
