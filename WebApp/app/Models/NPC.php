<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NPC
 *
 * @property int $NPCID
 * @property string $NAME
 * @property string $TYPE
 * @property string $COORDS
 * @property int|null $TEMPLATE_ID
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NPCAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read mixed $trade_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NPCTrade[] $trades
 * @property-read int|null $trades_count
 * @method static \Illuminate\Database\Eloquent\Builder|NPC newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NPC newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NPC query()
 * @method static \Illuminate\Database\Eloquent\Builder|NPC whereCOORDS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPC whereNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPC whereNPCID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPC whereTEMPLATEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPC whereTYPE($value)
 * @mixin \Eloquent
 */
class NPC extends Model
{
    use HasFactory;

    protected $table = "NPCS";
    protected $guarded = [];
    protected $primaryKey = 'NPCID';
    public $timestamps = false;

    public function trades()
    {
        return $this->hasMany(NPCTrade::class, 'NPC_ID', 'TEMPLATE_ID');
    }

    public function getTradeCountAttribute()
    {
        return $this->trades->count();
    }

    public function attributes()
    {
        return $this->hasMany(NPCAttribute::class, 'NPC_ID');
    }
}
