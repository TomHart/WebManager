<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterMaster extends Model
{
    use HasFactory;

    protected $table = 'CHARMASTER';
    protected $primaryKey = 'CHARID';
    protected $keyType = 'string';
}
