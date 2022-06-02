<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NPCAttribute extends Model
{
    use HasFactory;

    protected $table = 'NPC_ATTRIBUTES';
    protected $guarded = [];
    public $timestamps = false;

    public function npm()
    {
        return $this->belongsTo(NPC::class);
    }
}
