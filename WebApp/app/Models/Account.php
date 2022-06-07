<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'AMT_ACCOUNT';

    protected $fillable = [
        'account_id', 'password', 'password_confirmation'
    ];

    public $timestamps = false;


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
