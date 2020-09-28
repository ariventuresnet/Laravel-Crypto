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

    public function cryptoExchange(Exchange $exchange){
        
        return view('exchange.cryptoexchange')->with('exchange', $exchange);
    }

    public function viewCards(){
        $cards = Card::all();
        return view('cryptocard')->with('cards', $cards);
    }

    public function cryptoCard(Card $card){
        return view('card.cryptocard-show')->with('card', $card);
    }

}
