<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterMaster
 *
 * @property string $CHARID 캐릭터
 * @property string|null $OLDCHARID 서버통합 이전 캐릭터, 이름변경전 캐릭터
 * @property string|null $WORLD 월드명
 * @property string|null $ACCOUNTID 계정
 * @property string|null $SLOT slot index (0,1,2)
 * @property string|null $CHARTID 캐릭터 템플릿
 * @property string|null $CREATIONDATE 캐릭터 생성일
 * @method static Builder|CharacterMaster newModelQuery()
 * @method static Builder|CharacterMaster newQuery()
 * @method static Builder|CharacterMaster query()
 * @method static Builder|CharacterMaster whereACCOUNTID($value)
 * @method static Builder|CharacterMaster whereCHARID($value)
 * @method static Builder|CharacterMaster whereCHARTID($value)
 * @method static Builder|CharacterMaster whereCREATIONDATE($value)
 * @method static Builder|CharacterMaster whereOLDCHARID($value)
 * @method static Builder|CharacterMaster whereSLOT($value)
 * @method static Builder|CharacterMaster whereWORLD($value)
 * @mixin Eloquent
 */
class CharacterMaster extends Model
{
    use HasFactory;

    protected $table = 'CHARMASTER';
    protected $primaryKey = 'CHARID';
    protected $keyType = 'string';
}
