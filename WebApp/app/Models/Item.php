<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'ITEMS';
    protected $guarded = [];


    public function attributes(){
        return $this->belongsToMany(ItemAttribute::class, 'ITEMATTRIBUTES', 'ATTRIBUTEID', 'ITEMID');
    }
}
