<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\NPCTrade
 *
 * @property int $id
 * @property int $NPC_ID
 * @property int $ITEM_ID
 * @property int $COUNT
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $cost
 * @property-read mixed $img_html
 * @property-read Item|null $item
 * @property-read NPC|null $npc
 * @method static Builder|NPCTrade newModelQuery()
 * @method static Builder|NPCTrade newQuery()
 * @method static Builder|NPCTrade query()
 * @method static Builder|NPCTrade whereCOUNT($value)
 * @method static Builder|NPCTrade whereCreatedAt($value)
 * @method static Builder|NPCTrade whereITEMID($value)
 * @method static Builder|NPCTrade whereId($value)
 * @method static Builder|NPCTrade whereNPCID($value)
 * @method static Builder|NPCTrade whereUpdatedAt($value)
 * @mixin Eloquent
 */
class NPCTrade extends Model
{
    use HasFactory;

    protected $table = "NPC_TRADES";
    protected $guarded = [];

    public function npc()
    {
        return $this->belongsTo(NPC::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'ITEM_ID');
    }

    public function getImgHtmlAttribute()
    {
        return sprintf('<img alt="Item image" src="%s" style="display:inline"/> %s', asset(sprintf('items/%d.jpg', $this->ITEM_ID)), $this->item->ITEMNAME);
    }

    public function getCostAttribute()
    {
        return number_format($this->COUNT * $this->item->PRICE);
    }
}
