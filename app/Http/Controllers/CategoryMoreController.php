<?php

namespace App\Http\Controllers;

use App\Treasury;
use Illuminate\Http\Request;

class CategoryMoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $num_of_treasury = Treasury::get()->count();
        return view('more.index', compact('num_of_treasury'));
    }
}
