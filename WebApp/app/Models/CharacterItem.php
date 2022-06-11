<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\CharacterItem
 *
 * @property int $ITEMSEQ 아이템시퀀스
 * @property string|null $ACCOUNTID 계정
 * @property string|null $WORLD 월드명
 * @property string|null $CHARID 캐릭터
 * @property string|null $ITEMTID 아이템 템플릿
 * @property string|null $STACKCOUNT 누적수량
 * @property string|null $STATUS 1:FIELD,2:INVENTORY,3:EQUIP,8:SalesBox,51,CashInventory,52:MailBox, 100:BANK - AgpdItemStatus 참고
 * @property string|null $POS position, status에 따라 맵포지션 또는 인벤토리 그리드 포지션
 * @property string|null $NEEDLEVEL 장착 레벨
 * @property string|null $OWNTIME 획득 시간
 * @property string|null $CONVHIST 개조 내역
 * @property string|null $DURABILITY 내구도
 * @property string|null $MAXDUR 최대 내구도
 * @property string|null $FLAG 플래그 - 1:획득시 귀속, 2:장착시 귀속, 4:사용시 귀속, 8: ... 9: 1+8 귀속
 * @property string|null $OPT 아이템 옵션 ( ItemOptionTable.xlsx 의 숫자) 예)모든 스탯 +4 (132) -> update charitem set opt ='132,0,0,0,0' where itemseq = XX;
 * @property string|null $INUSE 사용중 여부
 * @property string|null $USECOUNT 사용 횟수
 * @property string|null $REMAINTIME 남은 시간
 * @property string|null $EXPIREDATE 만기일
 * @property string|null $SKILLPLUS 스킬 레벨 옵션 ( SkillTemplate.ini ) 예)파워서지 Lv1,헬스번 Lv1, 샤우팅 Lv1 ->update charitem set opt ='351,82,129' where itemseq = XX;
 * @property string|null $STAMINAREMAINTIME 펫 스테미나 남은 시간
 * @property-read mixed $slot_count
 * @property-read mixed $stats
 * @property-read Item|null $item
 * @method static Builder|CharacterItem newModelQuery()
 * @method static Builder|CharacterItem newQuery()
 * @method static Builder|CharacterItem query()
 * @method static Builder|CharacterItem whereACCOUNTID($value)
 * @method static Builder|CharacterItem whereCHARID($value)
 * @method static Builder|CharacterItem whereCONVHIST($value)
 * @method static Builder|CharacterItem whereDURABILITY($value)
 * @method static Builder|CharacterItem whereEXPIREDATE($value)
 * @method static Builder|CharacterItem whereFLAG($value)
 * @method static Builder|CharacterItem whereINUSE($value)
 * @method static Builder|CharacterItem whereITEMSEQ($value)
 * @method static Builder|CharacterItem whereITEMTID($value)
 * @method static Builder|CharacterItem whereMAXDUR($value)
 * @method static Builder|CharacterItem whereNEEDLEVEL($value)
 * @method static Builder|CharacterItem whereOPT($value)
 * @method static Builder|CharacterItem whereOWNTIME($value)
 * @method static Builder|CharacterItem wherePOS($value)
 * @method static Builder|CharacterItem whereREMAINTIME($value)
 * @method static Builder|CharacterItem whereSKILLPLUS($value)
 * @method static Builder|CharacterItem whereSTACKCOUNT($value)
 * @method static Builder|CharacterItem whereSTAMINAREMAINTIME($value)
 * @method static Builder|CharacterItem whereSTATUS($value)
 * @method static Builder|CharacterItem whereUSECOUNT($value)
 * @method static Builder|CharacterItem whereWORLD($value)
 * @mixin Eloquent
 * @mixin IdeHelperCharacterItem
 */
class CharacterItem extends Model
{
    use HasFactory;

    protected $table = 'CHARITEM';
    protected $primaryKey = 'ITEMSEQ';

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'ITEMTID');
    }


    public function getSlotCountAttribute()
    {

        $conv = $this->CONVHIST;
        if (empty($conv) || substr($conv, 0, 4) === '0:0:') {
            return null;
        }

        return explode(':', $conv)[1] ?? null;
    }

    public function getStatsAttribute()
    {
        $opt = $this->OPT;
        $optIds = array_filter(explode(',', $opt));
        if (empty($optIds)) {
            return [];
        }

        return ItemOption::whereIn('id', $optIds)->get()->pluck('DESCRIPTION');
    }
}
