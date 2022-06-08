<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $ITEMNAME
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $PRICE
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ItemAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read mixed $slot_count
 * @property-read mixed $stats
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereITEMNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item wherePRICE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;

    protected $table = 'ITEMS';
    protected $guarded = [];


    public function attributes()
    {
        return $this->belongsToMany(ItemAttribute::class, 'ITEMATTRIBUTES', 'ITEMID', 'ATTRIBUTEID')->withPivot('VALUE');
    }

    public function getSlotCountAttribute()
    {

        $conv = $this->pivot->CONVHIST;
        if (empty($conv) || substr($conv, 0, 4) === '0:0:') {
            return null;
        }

        return explode(':', $conv)[1] ?? null;
    }

    public function getStatsAttribute()
    {
        $opt = $this->pivot->OPT;
        $optIds = explode(',', $opt);
        if (!$optIds) {
            return [];
        }

        return ItemOption::whereIn('id', $optIds)->get()->pluck('DESCRIPTION');
    }
}
