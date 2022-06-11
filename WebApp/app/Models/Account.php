<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Account
 *
 * @property string|null $ACCOUNTID
 * @property string|null $PASSWORD
 * @property-read Collection|Character[] $characters
 * @property-read int|null $characters_count
 * @property-read bool $is_admin
 * @property-read string $is_admin_html
 * @property-read LoginStatus|null $loginStatus
 * @property-read AccountMaster|null $master
 * @property-write mixed $account_id
 * @property-write mixed $password
 * @property-write mixed $password_confirmation
 * @method static Builder|Account newModelQuery()
 * @method static Builder|Account newQuery()
 * @method static Builder|Account query()
 * @method static Builder|Account whereACCOUNTID($value)
 * @method static Builder|Account wherePASSWORD($value)
 * @mixin Eloquent
 * @mixin IdeHelperAccount
 */
class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'AMT_ACCOUNT';
    protected $primaryKey = 'ACCOUNTID';
    protected $keyType = 'string';

    protected $fillable = [
        'account_id', 'password', 'password_confirmation'
    ];

    public $timestamps = false;

    public function loginStatus(): HasOne
    {
        return $this->hasOne(LoginStatus::class, 'ACCOUNTID', 'ACCOUNTID');
    }

    public function master(): HasOne
    {
        return $this->hasOne(AccountMaster::class, 'ACCOUNTID', 'ACCOUNTID');
    }

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, CharacterMaster::class, 'ACCOUNTID', 'CHARID');
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->loginStatus && (int)$this->loginStatus->ACCOUNTLV === 92;
    }

    public function getIsAdminHtmlAttribute(): string
    {
        return sprintf('<i class="mdi mdi-%s"></i>', $this->is_admin ? 'check' : 'close');
    }

    public function getAuthIdentifierName(): string
    {
        return 'ACCOUNTID';
    }

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    public function setAccountIdAttribute($value)
    {
        $this->attributes['ACCOUNTID'] = $value;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['PASSWORD'] = $value;
    }

    public function setPasswordConfirmationAttribute($value)
    {
        $this->attributes['PASSWORD'] = $value;
    }
}
