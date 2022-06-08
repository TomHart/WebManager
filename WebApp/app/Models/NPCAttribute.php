<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NPCAttribute
 *
 * @property int $id
 * @property int $NPC_ID
 * @property string $ATTRIBUTE_NAME
 * @property string $VALUE
 * @property-read \App\Models\NPC|null $npm
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute whereATTRIBUTENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute whereNPCID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NPCAttribute whereVALUE($value)
 * @mixin \Eloquent
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
