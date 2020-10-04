<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'name', 'logo', 'url','currencies', 'type', 'description', 'pros', 'cons', 'btc_only', 'lightning', 'liquid', 'security', 'multi_sig', 'buy_crypto', 'ease', 'privacy', 'speed', 'fee', 'reputation', 'limit', 
    ];
}
