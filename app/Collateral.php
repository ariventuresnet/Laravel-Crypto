<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collateral extends Model
{
    protected $fillable = [
        'name', 'status'
    ];
}
