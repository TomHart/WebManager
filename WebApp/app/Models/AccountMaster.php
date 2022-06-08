<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AccountMaster
 *
 * @property string $ACCOUNTID
 * @property string $EMAIL
 * @property string $SOCIALNO
 * @property string $CREATION_DATE
 * @property string|null $LAST_DATE
 * @property string|null $MODIFY_DATE
 * @property string|null $PHONE
 * @property string|null $MOBILE
 * @property string|null $ZIPCODE
 * @property string|null $ADDR1
 * @property string|null $ADDR2
 * @property string $SMS_YN
 * @property string $EMAIL_YN
 * @property string|null $PENALTY_GBN
 * @property string|null $PAUSE_DATE
 * @property string|null $IP
 * @property string|null $LOGINCNT
 * @property string|null $NOMINATOR
 * @property string|null $RPG_LEVEL
 * @property string|null $LONEY_AGREEYN
 * @property string|null $LONEY_CHARGEYN
 * @property string|null $SEX
 * @method static Builder|AccountMaster newModelQuery()
 * @method static Builder|AccountMaster newQuery()
 * @method static Builder|AccountMaster query()
 * @method static Builder|AccountMaster whereACCOUNTID($value)
 * @method static Builder|AccountMaster whereADDR1($value)
 * @method static Builder|AccountMaster whereADDR2($value)
 * @method static Builder|AccountMaster whereCREATIONDATE($value)
 * @method static Builder|AccountMaster whereEMAIL($value)
 * @method static Builder|AccountMaster whereEMAILYN($value)
 * @method static Builder|AccountMaster whereIP($value)
 * @method static Builder|AccountMaster whereLASTDATE($value)
 * @method static Builder|AccountMaster whereLOGINCNT($value)
 * @method static Builder|AccountMaster whereLONEYAGREEYN($value)
 * @method static Builder|AccountMaster whereLONEYCHARGEYN($value)
 * @method static Builder|AccountMaster whereMOBILE($value)
 * @method static Builder|AccountMaster whereMODIFYDATE($value)
 * @method static Builder|AccountMaster whereNOMINATOR($value)
 * @method static Builder|AccountMaster wherePAUSEDATE($value)
 * @method static Builder|AccountMaster wherePENALTYGBN($value)
 * @method static Builder|AccountMaster wherePHONE($value)
 * @method static Builder|AccountMaster whereRPGLEVEL($value)
 * @method static Builder|AccountMaster whereSEX($value)
 * @method static Builder|AccountMaster whereSMSYN($value)
 * @method static Builder|AccountMaster whereSOCIALNO($value)
 * @method static Builder|AccountMaster whereZIPCODE($value)
 * @mixin Eloquent
 */
class AccountMaster extends Model
{
    use HasFactory;
    protected $table = 'AMT_MASTER';
    public $timestamps = false;
    protected $guarded = [];
}
