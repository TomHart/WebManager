<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'CHARDETAIL';
    protected $primaryKey = 'CHARID';
    protected $keyType = 'string';


    public function items(){
        return $this->belongsToMany(Item::class, 'CHARITEM', 'CHARID', 'ITEMTID')->withPivot('POS');
    }
}
