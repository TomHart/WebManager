<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'AMT_ACCOUNT';

    protected $fillable = [
        'account_id', 'password', 'password_confirmation'
    ];

    public $timestamps = false;

    public function loginStatus()
    {
        return $this->hasOne(LoginStatus::class, 'ACCOUNTID', 'ACCOUNTID');
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
