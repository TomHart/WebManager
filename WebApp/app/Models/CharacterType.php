<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterType extends Model
{
    use HasFactory;

    protected $table = 'CHARACTERS';
    protected $guarded = [];
    protected $primaryKey = 'TID';
}
