<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'name', 'logo', 'url','currencies', 'countries', 'collaterals', 'description', 'btc_only', 'fiat_loan', 'crypto_loan', 'term', 'interest', 'pros', 'cons', 'ease', 'privacy', 'speed', 'fee', 'reputation', 'limit', 
    ];
}
