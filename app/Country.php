<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'status', 'is_exchange', 'is_card', 'is_loan', 'is_interest'
    ];

    public function treasuries()
    {
        return $this->hasMany(Treasury::class);
    }
}
