<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $exchanges = Exchange::all();
        return view('welcome', compact('exchanges'));
    }

    public function cryptocurrency(Exchange $exchange){
        
        return view('cryptocurrency')->with('exchange', $exchange);
    }
}
