<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ItemOption
 *
 * @property int $id
 * @property string $DESCRIPTION
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ItemOption newModelQuery()
 * @method static Builder|ItemOption newQuery()
 * @method static Builder|ItemOption query()
 * @method static Builder|ItemOption whereCreatedAt($value)
 * @method static Builder|ItemOption whereDESCRIPTION($value)
 * @method static Builder|ItemOption whereId($value)
 * @method static Builder|ItemOption whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ItemOption extends Model
{
    use HasFactory;

    protected $table = 'ITEMOPTIONS';
    protected $guarded = [];
}
