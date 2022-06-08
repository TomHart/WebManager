<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemAttribute
 *
 * @property int $id
 * @property string $ATTRIBUTENAME
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereATTRIBUTENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ItemAttribute extends Model
{
    use HasFactory;
    protected $table = 'ITEMATTRIBUTESLIST';

    protected $guarded = [];
}
