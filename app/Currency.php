<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'name', 'status', 'is_exchange', 'is_card', 'is_loan', 'is_wallet'
    ];
}
