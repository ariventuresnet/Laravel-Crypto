<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoType extends Model
{
    protected $fillable = [
        'name', 'status',
    ];
}
