<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\CryptoType;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function index(){
        
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = CryptoType::get()->count();
        return view('autocomplete', compact('autocomplete_card', 'no_of_cryptos'));
    }
}
