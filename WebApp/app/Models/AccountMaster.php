<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountMaster extends Model
{
    use HasFactory;
    protected $table = 'AMT_MASTER';
    public $timestamps = false;
    protected $guarded = [];
}
