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
        return $this->hasMany(NPCTrade::class);
    }
}
