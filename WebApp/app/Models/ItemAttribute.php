<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    use HasFactory;
    protected $table = 'ITEMATTRIBUTESLIST';

    protected $guarded = [];
}
