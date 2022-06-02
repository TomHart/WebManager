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
}
