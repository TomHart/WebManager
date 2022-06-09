<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $ITEMNAME
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $PRICE
 * @property-read Collection|ItemAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read mixed $slot_count
 * @property-read mixed $stats
 * @method static Builder|Item newModelQuery()
 * @method static Builder|Item newQuery()
 * @method static Builder|Item query()
 * @method static Builder|Item whereCreatedAt($value)
 * @method static Builder|Item whereITEMNAME($value)
 * @method static Builder|Item whereId($value)
 * @method static Builder|Item wherePRICE($value)
 * @method static Builder|Item whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $DESCRIPTION
 * @method static Builder|Item whereDESCRIPTION($value)
 */
class Item extends Model
{
    use HasFactory;

    protected $table = 'ITEMS';
    protected $guarded = [];

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(ItemAttribute::class, 'ITEMATTRIBUTES', 'ITEMID', 'ATTRIBUTEID')->withPivot('VALUE');
    }
//
//    public function getSlotCountAttribute()
//    {
//
//        $conv = $this->pivot->CONVHIST;
//        if (empty($conv) || substr($conv, 0, 4) === '0:0:') {
//            return null;
//        }
//
//        return explode(':', $conv)[1] ?? null;
//    }
//
//    public function getStatsAttribute()
//    {
//        $opt = $this->pivot->OPT;
//        $optIds = array_filter(explode(',', $opt));
//        if (empty($optIds)) {
//            return [];
//        }
//
//        return ItemOption::whereIn('id', $optIds)->get()->pluck('DESCRIPTION');
//    }
}
