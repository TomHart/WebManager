<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
