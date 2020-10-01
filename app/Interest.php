<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'name', 'logo', 'url','deposits', 'countries', 'description', 'btc_only', 'term', 'interest', 'pros', 'cons', 'ease', 'privacy', 'speed', 'fee', 'reputation', 'limit', 
    ];
}
