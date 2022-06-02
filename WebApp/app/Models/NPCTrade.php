<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
