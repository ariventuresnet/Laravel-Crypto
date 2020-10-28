<?php

namespace App\Http\Controllers;

use App\Country;
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
        return view('more.index', compact('num_of_treasury'));
    }
    //frontend list
    public function viewTreasuries(){
        $treasuries = Treasury::get();
        $countries  = Country::select('name')->get();
        return view('more.companyTreasuries')->with('treasuries',$treasuries)->with('countries', $countries);
    }
}
