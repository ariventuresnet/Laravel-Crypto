<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'name', 'status',
    ];
}
