<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletType extends Model
{
    protected $fillable = [
        'name', 'status',
    ];
}
