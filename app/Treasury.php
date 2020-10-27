<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $fillable = [
        'name', 'filings', 'countries', 'symbol', 'btc_holding', 'status',
    ];
}
