<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\NPCEvent
 *
 * @property int $id
 * @property int $NPC_ID
 * @property int|null $FUNCTION_ID
 * @property int|null $EVENT_ID
 * @property int|null $COND_START
 * @property int|null $COND_TYPE
 * @property int|null $COND_TARGET_ITEM_ID
 * @property int|null $COND_AREA_TYPE
 * @property int|null $COND_AREA_SPHERE_RADIUS
 * @property int|null $COND_AREA_FAN_RADIUS
 * @property int|null $COND_AREA_ANGLE
 * @property int|null $COND_AREA_BOX_INF
 * @property int|null $COND_AREA_BOX_SUP
 * @property int|null $COND_END
 * @property int|null $DIALOG_START
 * @property int|null $NPC_TRADE_START
 * @property int|null $TEMPLATE
 * @property int|null $NPC_TRADE_END
 * @property int|null $DIALOG_END
 * @property int|null $QUEST_GROUP_ID
 * @property int|null $QUEST_END
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read NPC|null $npc
 * @method static Builder|NPCEvent newModelQuery()
 * @method static Builder|NPCEvent newQuery()
 * @method static Builder|NPCEvent query()
 * @method static Builder|NPCEvent whereCONDAREAANGLE($value)
 * @method static Builder|NPCEvent whereCONDAREABOXINF($value)
 * @method static Builder|NPCEvent whereCONDAREABOXSUP($value)
 * @method static Builder|NPCEvent whereCONDAREAFANRADIUS($value)
 * @method static Builder|NPCEvent whereCONDAREASPHERERADIUS($value)
 * @method static Builder|NPCEvent whereCONDAREATYPE($value)
 * @method static Builder|NPCEvent whereCONDEND($value)
 * @method static Builder|NPCEvent whereCONDSTART($value)
 * @method static Builder|NPCEvent whereCONDTARGETITEMID($value)
 * @method static Builder|NPCEvent whereCONDTYPE($value)
 * @method static Builder|NPCEvent whereCreatedAt($value)
 * @method static Builder|NPCEvent whereDIALOGEND($value)
 * @method static Builder|NPCEvent whereDIALOGSTART($value)
 * @method static Builder|NPCEvent whereEVENTID($value)
 * @method static Builder|NPCEvent whereFUNCTIONID($value)
 * @method static Builder|NPCEvent whereId($value)
 * @method static Builder|NPCEvent whereNPCID($value)
 * @method static Builder|NPCEvent whereNPCTRADEEND($value)
 * @method static Builder|NPCEvent whereNPCTRADESTART($value)
 * @method static Builder|NPCEvent whereQUESTEND($value)
 * @method static Builder|NPCEvent whereQUESTGROUPID($value)
 * @method static Builder|NPCEvent whereTEMPLATE($value)
 * @method static Builder|NPCEvent whereUpdatedAt($value)
 * @mixin Eloquent
 * @mixin IdeHelperNPCEvent
 */
class NPCEvent extends Model
{
    use HasFactory;

    protected $table = "NPC_EVENTS";
    protected $guarded = [];

    public static array $columnMap = [
        'FUNCTION_ID' => 'Function',
        'EVENT_ID' => 'EventID',
        'COND_START' => 'CondStart',
        'COND_END' => 'CondEnd',
        'DIALOG_START' => 'NPCDialogStart',
        'NPC_TRADE_START' => 'NPCTradeStart',
        'TEMPLATE' => 'Template',
        'NPC_TRADE_END' => 'NPCTradeEnd',
        'DIALOG_END' => 'NPCDialogEnd',
        'QUEST_GROUP_ID' => 'QuestGroupID',
        'QUEST_END' => 'QuestEnd',
    ];

    public function npc(): BelongsTo
    {
        return $this->belongsTo(NPC::class, 'NPCID', 'NPC_ID');
    }

    public static function hydrateFromIni(int $id, array $data): ?self
    {
        $model = self::updateOrCreate(
            [
                'NPC_ID' => $id,
                'FUNCTION_ID' => $data['Function'],
                'EVENT_ID' => $data['EventID']
            ],
            [
                'NPC_ID' => $id,
                'FUNCTION_ID' => $data['Function'] ?? null,
                'EVENT_ID' => $data['EventID'] ?? null,
                'COND_START' => $data['CondStart'] ?? null,
                'COND_END' => $data['CondEnd'] ?? null,
                'DIALOG_START' => $data['NPCDialogStart'] ?? null,
                'NPC_TRADE_START' => $data['NPCTradeStart'] ?? null,
                'TEMPLATE' => $data['Template'] ?? null,
                'NPC_TRADE_END' => $data['NPCTradeEnd'] ?? null,
                'DIALOG_END' => $data['NPCDialogEnd'] ?? null,
                'QUEST_GROUP_ID' => $data['QuestGroupID'] ?? null,
                'QUEST_END' => $data['QuestEnd'] ?? null
            ]
        );

        return $model;
    }
}
