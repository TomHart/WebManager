<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NPCAttribute
 *
 * @property int $id
 * @property int $NPC_ID
 * @property string $ATTRIBUTE_NAME
 * @property string $VALUE
 * @property-read NPC|null $npm
 * @method static Builder|NPCAttribute newModelQuery()
 * @method static Builder|NPCAttribute newQuery()
 * @method static Builder|NPCAttribute query()
 * @method static Builder|NPCAttribute whereATTRIBUTENAME($value)
 * @method static Builder|NPCAttribute whereId($value)
 * @method static Builder|NPCAttribute whereNPCID($value)
 * @method static Builder|NPCAttribute whereVALUE($value)
 * @mixin Eloquent
 */
class NPCAttribute extends Model
{
    use HasFactory;

    protected $table = 'NPC_ATTRIBUTES';
    protected $guarded = [];
    public $timestamps = false;

    public function npm()
    {
        return $this->belongsTo(NPC::class);
    }
}
