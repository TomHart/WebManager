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
        return $this->belongsToMany(ItemAttribute::class, 'ITEMATTRIBUTES', 'ITEMID', 'ATTRIBUTEID')->withPivot('VALUE');
    }

    public function getSlotCountAttribute(){

        $conv = $this->pivot->CONVHIST;
        if(empty($conv) || substr($conv, 0, 4) === '0:0:'){
            return null;
        }

        return explode(':', $conv)[1] ?? null;
    }
    public function getStatsAttribute(){

        $opt = $this->pivot->OPT;
        $optIds = explode(',', $opt);
        if(!$optIds){
            return [];
        }
        
        return ItemOption::whereIn('id', $optIds)->get()->pluck('DESCRIPTION');
    }
}
