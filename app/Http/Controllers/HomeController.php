<?php

namespace App\Http\Controllers;

use App\Card;
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

    public function cryptoExchange($name){
        
        $exchangeName = str_replace('_', ' ', $name);
        $exchange = Exchange::where('name', $exchangeName)->first();
        return view('exchange.cryptoexchange')->with('exchange', $exchange);
    }

    public function viewCards(){
        $cards = Card::all();
        return view('cryptocard')->with('cards', $cards);
    }

    public function cryptoCard($name){

        $cardName = str_replace('_', ' ', $name);
        $card = Card::where('name', $cardName)->first();
        return view('card.cryptocard-show')->with('card', $card);
    }

}
