<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $fillable = [
        'currency_id', 'crypto_type_id', 'market_cap', 'algorithm', 'dominance',
    ];

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function cryptoType(){
        return $this->belongsTo(CryptoType::class);
    }

}
