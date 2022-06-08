<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NPCTrade
 *
 * @property int $id
 * @property int $NPC_ID
 * @property int $ITEM_ID
 * @property int $COUNT
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $cost
 * @property-read mixed $img_html
 * @property-read \App\Models\Item|null $item
 * @property-read \App\Models\NPC|null $npc
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade whereCOUNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade whereITEMID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade whereNPCID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCTrade whereUpdatedAt($value)
 * @mixin \Eloquent
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
        return sprintf('<img src="%s" style="display:inline"/> %s', asset(sprintf('items/%d.jpg', $this->ITEM_ID)), $this->item->ITEMNAME);
    }

    public function getCostAttribute()
    {
        return number_format($this->COUNT * $this->item->PRICE);
    }
}
