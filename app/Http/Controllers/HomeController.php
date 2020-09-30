<?php

namespace App\Http\Controllers;

use App\Card;
use App\Exchange;
use App\Loan;
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

    public function viewLoans(){
        $loans = Loan::all();
        return view('cryptoloan')->with('loans', $loans);
    }

    public function cryptoLoan($name){

        $loanName = str_replace('_', ' ', $name);
        $loan = Loan::where('name', $loanName)->first();
        return view('loan.cryptoloan-show')->with('loan', $loan);

    }

}
