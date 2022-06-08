<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LoginStatus
 *
 * @property string|null $ACCOUNTID
 * @property string|null $STATUS
 * @property string|null $CHARID
 * @property string|null $CID
 * @property string|null $SERVER
 * @property string|null $SERVERUID
 * @property string|null $ACCOUNTLV
 * @property string|null $NID
 * @property string|null $LASTCHARID
 * @property string|null $ACCESSDATE
 * @method static Builder|LoginStatus newModelQuery()
 * @method static Builder|LoginStatus newQuery()
 * @method static Builder|LoginStatus query()
 * @method static Builder|LoginStatus whereACCESSDATE($value)
 * @method static Builder|LoginStatus whereACCOUNTID($value)
 * @method static Builder|LoginStatus whereACCOUNTLV($value)
 * @method static Builder|LoginStatus whereCHARID($value)
 * @method static Builder|LoginStatus whereCID($value)
 * @method static Builder|LoginStatus whereLASTCHARID($value)
 * @method static Builder|LoginStatus whereNID($value)
 * @method static Builder|LoginStatus whereSERVER($value)
 * @method static Builder|LoginStatus whereSERVERUID($value)
 * @method static Builder|LoginStatus whereSTATUS($value)
 * @mixin Eloquent
 */
class LoginStatus extends Model
{
    use HasFactory;
    protected $table = 'LOGINSTATUS';

    public $timestamps = false;
}
