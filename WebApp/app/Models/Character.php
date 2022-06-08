<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character
 *
 * @property string $CHARID
 * @property string|null $TITLE 스킬 초기화 한경우 국내:치약바르자, 글로벌:Initialize  추가되는 특성을 붙여서 쓰기로 한다.
 * @property string|null $POS
 * @property string|null $CRIMINALSTATUS
 * @property string|null $MURDERPOINT
 * @property string|null $RCFTIME
 * @property string|null $RMFTIME
 * @property string|null $INVENMONEY
 * @property string|null $HP
 * @property string|null $MP
 * @property string|null $SP
 * @property string|null $EXP
 * @property string|null $LV
 * @property string|null $SKILLPOINT
 * @property string|null $QUICKBELT
 * @property string|null $LATESTREGION
 * @property string|null $FLAG
 * @property string|null $FLAG2
 * @property string|null $flag3
 * @property string|null $STATUS
 * @property string|null $RESURRECTDATE
 * @property string|null $TRANSFORMDATE
 * @property string|null $CURCONNDATE
 * @property string|null $LASTVISITDATE
 * @property string|null $LASTVISITIP
 * @property string|null $HAIR
 * @property string|null $FACE
 * @property string|null $DEADTYPE
 * @property string|null $CHARISMAPOINT
 * @property string|null $NICKNAME
 * @property string|null $COOLDOWN
 * @property string|null $HEROICPOINT 히로익 포인트
 * @property string|null $BSLastKilledTime 배틀스퀘어 마지막 죽은 시간
 * @property-read Collection|Item[] $items
 * @property-read int|null $items_count
 * @method static Builder|Character newModelQuery()
 * @method static Builder|Character newQuery()
 * @method static Builder|Character query()
 * @method static Builder|Character whereBSLastKilledTime($value)
 * @method static Builder|Character whereCHARID($value)
 * @method static Builder|Character whereCHARISMAPOINT($value)
 * @method static Builder|Character whereCOOLDOWN($value)
 * @method static Builder|Character whereCRIMINALSTATUS($value)
 * @method static Builder|Character whereCURCONNDATE($value)
 * @method static Builder|Character whereDEADTYPE($value)
 * @method static Builder|Character whereEXP($value)
 * @method static Builder|Character whereFACE($value)
 * @method static Builder|Character whereFLAG($value)
 * @method static Builder|Character whereFLAG2($value)
 * @method static Builder|Character whereFlag3($value)
 * @method static Builder|Character whereHAIR($value)
 * @method static Builder|Character whereHEROICPOINT($value)
 * @method static Builder|Character whereHP($value)
 * @method static Builder|Character whereINVENMONEY($value)
 * @method static Builder|Character whereLASTVISITDATE($value)
 * @method static Builder|Character whereLASTVISITIP($value)
 * @method static Builder|Character whereLATESTREGION($value)
 * @method static Builder|Character whereLV($value)
 * @method static Builder|Character whereMP($value)
 * @method static Builder|Character whereMURDERPOINT($value)
 * @method static Builder|Character whereNICKNAME($value)
 * @method static Builder|Character wherePOS($value)
 * @method static Builder|Character whereQUICKBELT($value)
 * @method static Builder|Character whereRCFTIME($value)
 * @method static Builder|Character whereRESURRECTDATE($value)
 * @method static Builder|Character whereRMFTIME($value)
 * @method static Builder|Character whereSKILLPOINT($value)
 * @method static Builder|Character whereSP($value)
 * @method static Builder|Character whereSTATUS($value)
 * @method static Builder|Character whereTITLE($value)
 * @method static Builder|Character whereTRANSFORMDATE($value)
 * @mixin Eloquent
 */
class Character extends Model
{
    use HasFactory;

    protected $table = 'CHARDETAIL';
    protected $primaryKey = 'CHARID';
    protected $keyType = 'string';

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'CHARITEM', 'CHARID', 'ITEMTID')->withPivot(['ITEMSEQ', 'POS', 'STACKCOUNT', 'CONVHIST', 'OPT']);
    }

    public function master(): HasOne
    {
        return $this->hasOne(CharacterMaster::class, 'CHARID', 'CHARID');
    }
}
