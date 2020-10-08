<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutocompleteCard extends Model
{
    protected $fillable = [
        'no_of_currency', 'no_of_country', 'no_of_payment_method', 'no_of_diposit', 'no_of_collateral', 'no_of_wallet'
    ];

}
