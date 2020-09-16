<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
        'name', 'logo', 'url','currencies', 'countries', 'payments', 'description', 'pros', 'cons', 'ease', 'privacy', 'speed', 'fee', 'reputation', 'limit', 
    ];
}
