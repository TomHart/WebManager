<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacterItem extends Model
{
    use HasFactory;

    protected $table = 'CHARITEM';
    protected $primaryKey = 'ITEMSEQ';

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'ITEMTID');
    }


    public function getSlotCountAttribute()
    {

        $conv = $this->CONVHIST;
        if (empty($conv) || substr($conv, 0, 4) === '0:0:') {
            return null;
        }

        return explode(':', $conv)[1] ?? null;
    }

    public function getStatsAttribute()
    {
        $opt = $this->OPT;
        $optIds = array_filter(explode(',', $opt));
        if (empty($optIds)) {
            return [];
        }

        return ItemOption::whereIn('id', $optIds)->get()->pluck('DESCRIPTION');
    }
}
