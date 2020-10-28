<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Country;

class Treasury extends Model
{
    protected $fillable = [
        'name', 'filings', 'symbol', 'btc_holding', 'status','country_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
