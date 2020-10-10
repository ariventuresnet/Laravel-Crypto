<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name', 'status', 'is_exchange', 'is_card',
    ];
}
