<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\CharacterType
 *
 * @property int $TID
 * @property string|null $NAME
 * @property int|null $TYPE
 * @property int|null $RACE
 * @property int|null $GENDER
 * @property int|null $CLASS
 * @property int|null $LVL
 * @property int|null $STR
 * @property int|null $DEX
 * @property int|null $INT
 * @property int|null $CON
 * @property int|null $CHA
 * @property int|null $WIS
 * @property int|null $AC
 * @property int|null $MAX_HP
 * @property int|null $MAX_SP
 * @property int|null $MAX_MP
 * @property int|null $CUR_HP
 * @property int|null $CUR_SP
 * @property int|null $CUR_MP
 * @property int|null $MOVEMENT_WALK
 * @property int|null $MOVEMENT_RUN
 * @property int|null $AR
 * @property int|null $DR
 * @property int|null $MAR
 * @property int|null $MDR
 * @property int|null $MIN_DAMAGE
 * @property int|null $MAX_DAMAGE
 * @property int|null $ATK_SPEED
 * @property int|null $RANGE
 * @property int|null $FIRE_RES
 * @property int|null $WATER_RES
 * @property int|null $AIR_RES
 * @property int|null $EARTH_RES
 * @property int|null $MAGIC_RES
 * @property int|null $POISON_RES
 * @property int|null $ICE_RES
 * @property int|null $THUNDER_RES
 * @property int|null $MAGIC_HISTORY
 * @property int|null $MURDER_POINT
 * @property int|null $EXP
 * @property int|null $FIRE_MIN_DAMAGE
 * @property int|null $FIRE_MAX_DAMAGE
 * @property int|null $WATER_MIN_DAMAGE
 * @property int|null $WATER_MAX_DAMAGE
 * @property int|null $EARTH_MIN_DAMAGE
 * @property int|null $EARTH_MAX_DAMAGE
 * @property int|null $AIR_MIN_DAMAGE
 * @property int|null $AIR_MAX_DAMAGE
 * @property int|null $MAGIC_MIN_DAMAGE
 * @property int|null $MAGIC_MAX_DAMAGE
 * @property int|null $POISON_MIN_DAMAGE
 * @property int|null $POISON_MAX_DAMAGE
 * @property int|null $ICE_MIN_DAMAGE
 * @property int|null $ICE_MAX_DAMAGE
 * @property int|null $THUNDER_MIN_DAMAGE
 * @property int|null $THUNDER_MAX_DAMAGE
 * @property int|null $PHYSICAL_RESISTANCE
 * @property int|null $SKILL_BLOCK
 * @property int|null $SIGHT
 * @property int|null $BADGE1_RANK_POINT
 * @property int|null $BADGE2_RANK_POINT
 * @property int|null $BADGE3_RANK_POINT
 * @property int|null $RANK
 * @property int|null $ITEM_POINT
 * @property int|null $GUILD
 * @property int|null $GUILD_RANK
 * @property int|null $GUILD_SCORE
 * @property int|null $LOST_EXP
 * @property int|null $WEAPON
 * @property string|null $ITEM1
 * @property string|null $ITEM2
 * @property string|null $ITEM3
 * @property string|null $ITEM4
 * @property int|null $ARMOR_HEAD
 * @property int|null $ARMOR_BODY
 * @property int|null $ARMOR_ARM
 * @property int|null $ARMOR_HAND
 * @property int|null $ARMOR_LEG
 * @property int|null $ARMOR_FOOT
 * @property int|null $ARMOR_MANTLE
 * @property int|null $MONEY
 * @property int|null $GELD_MIN
 * @property int|null $GELD_MAX
 * @property int|null $DROP_TID
 * @property int|null $SLOW_PERCENT
 * @property int|null $SLOW_TIME
 * @property int|null $FAST_PERCENT
 * @property int|null $FAST_TIME
 * @property int|null $PRODUCT_SKIN_ITEMNAME
 * @property int|null $PRODUCT_MEAT
 * @property int|null $PRODUCT_MEAT_ITEMNAME
 * @property int|null $PRODUCT_GARBAGE
 * @property int|null $PRODUCT_GARBAGE_ITMENAME
 * @property int|null $ATTRIBUTE_TYPE
 * @property string|null $NAME_COLOR
 * @property int|null $DROPRANK
 * @property float|null $DROPMEDITATION
 * @property int|null $SPIRIT_TYPE
 * @property int|null $LANDATTACHTYPE
 * @property int|null $TAMABLE
 * @property int|null $RUN_CORRECT
 * @property int|null $ATTACK_CORRECT
 * @property int|null $SIEGEWARCHARTYPE
 * @property int|null $RANGETYPE
 * @property int|null $STAMINAPOINT
 * @property int|null $PETTYPE
 * @property int|null $STARTSTAMINA
 * @property int|null $HEROIC_MIN_DAMAGE
 * @property int|null $HEROIC_MAX_DAMAGE
 * @property int|null $HEROIC_DEFENSE_POINT
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|CharacterType newModelQuery()
 * @method static Builder|CharacterType newQuery()
 * @method static Builder|CharacterType query()
 * @method static Builder|CharacterType whereAC($value)
 * @method static Builder|CharacterType whereAIRMAXDAMAGE($value)
 * @method static Builder|CharacterType whereAIRMINDAMAGE($value)
 * @method static Builder|CharacterType whereAIRRES($value)
 * @method static Builder|CharacterType whereAR($value)
 * @method static Builder|CharacterType whereARMORARM($value)
 * @method static Builder|CharacterType whereARMORBODY($value)
 * @method static Builder|CharacterType whereARMORFOOT($value)
 * @method static Builder|CharacterType whereARMORHAND($value)
 * @method static Builder|CharacterType whereARMORHEAD($value)
 * @method static Builder|CharacterType whereARMORLEG($value)
 * @method static Builder|CharacterType whereARMORMANTLE($value)
 * @method static Builder|CharacterType whereATKSPEED($value)
 * @method static Builder|CharacterType whereATTACKCORRECT($value)
 * @method static Builder|CharacterType whereATTRIBUTETYPE($value)
 * @method static Builder|CharacterType whereBADGE1RANKPOINT($value)
 * @method static Builder|CharacterType whereBADGE2RANKPOINT($value)
 * @method static Builder|CharacterType whereBADGE3RANKPOINT($value)
 * @method static Builder|CharacterType whereCHA($value)
 * @method static Builder|CharacterType whereCLASS($value)
 * @method static Builder|CharacterType whereCON($value)
 * @method static Builder|CharacterType whereCURHP($value)
 * @method static Builder|CharacterType whereCURMP($value)
 * @method static Builder|CharacterType whereCURSP($value)
 * @method static Builder|CharacterType whereCreatedAt($value)
 * @method static Builder|CharacterType whereDEX($value)
 * @method static Builder|CharacterType whereDR($value)
 * @method static Builder|CharacterType whereDROPMEDITATION($value)
 * @method static Builder|CharacterType whereDROPRANK($value)
 * @method static Builder|CharacterType whereDROPTID($value)
 * @method static Builder|CharacterType whereEARTHMAXDAMAGE($value)
 * @method static Builder|CharacterType whereEARTHMINDAMAGE($value)
 * @method static Builder|CharacterType whereEARTHRES($value)
 * @method static Builder|CharacterType whereEXP($value)
 * @method static Builder|CharacterType whereFASTPERCENT($value)
 * @method static Builder|CharacterType whereFASTTIME($value)
 * @method static Builder|CharacterType whereFIREMAXDAMAGE($value)
 * @method static Builder|CharacterType whereFIREMINDAMAGE($value)
 * @method static Builder|CharacterType whereFIRERES($value)
 * @method static Builder|CharacterType whereGELDMAX($value)
 * @method static Builder|CharacterType whereGELDMIN($value)
 * @method static Builder|CharacterType whereGENDER($value)
 * @method static Builder|CharacterType whereGUILD($value)
 * @method static Builder|CharacterType whereGUILDRANK($value)
 * @method static Builder|CharacterType whereGUILDSCORE($value)
 * @method static Builder|CharacterType whereHEROICDEFENSEPOINT($value)
 * @method static Builder|CharacterType whereHEROICMAXDAMAGE($value)
 * @method static Builder|CharacterType whereHEROICMINDAMAGE($value)
 * @method static Builder|CharacterType whereICEMAXDAMAGE($value)
 * @method static Builder|CharacterType whereICEMINDAMAGE($value)
 * @method static Builder|CharacterType whereICERES($value)
 * @method static Builder|CharacterType whereINT($value)
 * @method static Builder|CharacterType whereITEM1($value)
 * @method static Builder|CharacterType whereITEM2($value)
 * @method static Builder|CharacterType whereITEM3($value)
 * @method static Builder|CharacterType whereITEM4($value)
 * @method static Builder|CharacterType whereITEMPOINT($value)
 * @method static Builder|CharacterType whereLANDATTACHTYPE($value)
 * @method static Builder|CharacterType whereLOSTEXP($value)
 * @method static Builder|CharacterType whereLVL($value)
 * @method static Builder|CharacterType whereMAGICHISTORY($value)
 * @method static Builder|CharacterType whereMAGICMAXDAMAGE($value)
 * @method static Builder|CharacterType whereMAGICMINDAMAGE($value)
 * @method static Builder|CharacterType whereMAGICRES($value)
 * @method static Builder|CharacterType whereMAR($value)
 * @method static Builder|CharacterType whereMAXDAMAGE($value)
 * @method static Builder|CharacterType whereMAXHP($value)
 * @method static Builder|CharacterType whereMAXMP($value)
 * @method static Builder|CharacterType whereMAXSP($value)
 * @method static Builder|CharacterType whereMDR($value)
 * @method static Builder|CharacterType whereMINDAMAGE($value)
 * @method static Builder|CharacterType whereMONEY($value)
 * @method static Builder|CharacterType whereMOVEMENTRUN($value)
 * @method static Builder|CharacterType whereMOVEMENTWALK($value)
 * @method static Builder|CharacterType whereMURDERPOINT($value)
 * @method static Builder|CharacterType whereNAME($value)
 * @method static Builder|CharacterType whereNAMECOLOR($value)
 * @method static Builder|CharacterType wherePETTYPE($value)
 * @method static Builder|CharacterType wherePHYSICALRESISTANCE($value)
 * @method static Builder|CharacterType wherePOISONMAXDAMAGE($value)
 * @method static Builder|CharacterType wherePOISONMINDAMAGE($value)
 * @method static Builder|CharacterType wherePOISONRES($value)
 * @method static Builder|CharacterType wherePRODUCTGARBAGE($value)
 * @method static Builder|CharacterType wherePRODUCTGARBAGEITMENAME($value)
 * @method static Builder|CharacterType wherePRODUCTMEAT($value)
 * @method static Builder|CharacterType wherePRODUCTMEATITEMNAME($value)
 * @method static Builder|CharacterType wherePRODUCTSKINITEMNAME($value)
 * @method static Builder|CharacterType whereRACE($value)
 * @method static Builder|CharacterType whereRANGE($value)
 * @method static Builder|CharacterType whereRANGETYPE($value)
 * @method static Builder|CharacterType whereRANK($value)
 * @method static Builder|CharacterType whereRUNCORRECT($value)
 * @method static Builder|CharacterType whereSIEGEWARCHARTYPE($value)
 * @method static Builder|CharacterType whereSIGHT($value)
 * @method static Builder|CharacterType whereSKILLBLOCK($value)
 * @method static Builder|CharacterType whereSLOWPERCENT($value)
 * @method static Builder|CharacterType whereSLOWTIME($value)
 * @method static Builder|CharacterType whereSPIRITTYPE($value)
 * @method static Builder|CharacterType whereSTAMINAPOINT($value)
 * @method static Builder|CharacterType whereSTARTSTAMINA($value)
 * @method static Builder|CharacterType whereSTR($value)
 * @method static Builder|CharacterType whereTAMABLE($value)
 * @method static Builder|CharacterType whereTHUNDERMAXDAMAGE($value)
 * @method static Builder|CharacterType whereTHUNDERMINDAMAGE($value)
 * @method static Builder|CharacterType whereTHUNDERRES($value)
 * @method static Builder|CharacterType whereTID($value)
 * @method static Builder|CharacterType whereTYPE($value)
 * @method static Builder|CharacterType whereUpdatedAt($value)
 * @method static Builder|CharacterType whereWATERMAXDAMAGE($value)
 * @method static Builder|CharacterType whereWATERMINDAMAGE($value)
 * @method static Builder|CharacterType whereWATERRES($value)
 * @method static Builder|CharacterType whereWEAPON($value)
 * @method static Builder|CharacterType whereWIS($value)
 * @mixin Eloquent
 * @mixin IdeHelperCharacterType
 */
class CharacterType extends Model
{
    use HasFactory;

    protected $table = 'CHARACTERS';
    protected $guarded = [];
    protected $primaryKey = 'TID';
}
