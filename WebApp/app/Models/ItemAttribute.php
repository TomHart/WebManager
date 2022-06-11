<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ItemAttribute
 *
 * @property int $id
 * @property string $ATTRIBUTENAME
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ItemAttribute newModelQuery()
 * @method static Builder|ItemAttribute newQuery()
 * @method static Builder|ItemAttribute query()
 * @method static Builder|ItemAttribute whereATTRIBUTENAME($value)
 * @method static Builder|ItemAttribute whereCreatedAt($value)
 * @method static Builder|ItemAttribute whereId($value)
 * @method static Builder|ItemAttribute whereUpdatedAt($value)
 * @mixin Eloquent
 * @mixin IdeHelperItemAttribute
 */
class ItemAttribute extends Model
{
    use HasFactory;

    protected $table = 'ITEMATTRIBUTESLIST';

    protected $guarded = [];
}
