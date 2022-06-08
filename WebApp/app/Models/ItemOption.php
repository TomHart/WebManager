<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemOption
 *
 * @property int $id
 * @property string $DESCRIPTION
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption whereDESCRIPTION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemOption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ItemOption extends Model
{
    use HasFactory;

    protected $table = 'ITEMOPTIONS';
    protected $guarded = [];
}
