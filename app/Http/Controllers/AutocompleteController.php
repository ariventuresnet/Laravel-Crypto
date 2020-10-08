<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function index(){
        
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('autocomplete')->with('autocomplete_card', $autocomplete_card);
    }
}
