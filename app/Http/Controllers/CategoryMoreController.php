<?php

namespace App\Http\Controllers;

use App\Country;
use App\Crypto;
use App\Treasury;
use Illuminate\Http\Request;

class CategoryMoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //backend list
    public function index(){
        $num_of_treasury = Treasury::get()->count();
        $num_of_cryptos = Crypto::get()->count();
        return view('more.index', compact('num_of_treasury', 'num_of_cryptos'));
    }
    
}
