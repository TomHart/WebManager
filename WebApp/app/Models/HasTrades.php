<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Relation;

interface HasTrades
{
    public function trades(): Relation;
}
