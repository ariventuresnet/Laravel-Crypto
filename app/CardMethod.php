<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardMethod extends Model
{
    protected $fillable = [
        'name', 'status',
    ];
}
