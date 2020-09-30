<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name', 'logo', 'url','currencies', 'countries', 'payments', 'description', 'pros', 'cons', 'ease', 'privacy', 'speed', 'fee', 'reputation', 'limit', 'price', 'delivery_fees', 'coverage', 'monthly_fees', 'atm_fees', 'monthly_atm_limit', 'online_purchases', 'monthly_purchases',
    ];
}
