<?php

namespace App\Http\Controllers;

use App\Card;
use App\Exchange;
use App\Interest;
use App\Loan;
use App\Wallet;
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

    public function cryptoExchangeDetails($name){
        
        $exchangeName = str_replace('_', ' ', $name);
        $exchange = Exchange::where('name', $exchangeName)->first();
        return view('exchange.cryptoexchange')->with('exchange', $exchange);
    }

    public function viewCards(){
        $cards = Card::all();
        return view('cryptocard')->with('cards', $cards);
    }

    public function cryptoCardDetails($name){

        $cardName = str_replace('_', ' ', $name);
        $card = Card::where('name', $cardName)->first();
        return view('card.cryptocard-show')->with('card', $card);
    }

    public function viewLoans(){
        $loans = Loan::all();
        return view('cryptoloan')->with('loans', $loans);
    }

    public function cryptoLoanDetails($name){

        $loanName = str_replace('_', ' ', $name);
        $loan = Loan::where('name', $loanName)->first();
        return view('loan.cryptoloan-show')->with('loan', $loan);

    }

    public function viewInterestAccounts(){
        $interests = Interest::all();
        return view('cryptointerest')->with('interests', $interests);
    }

    public function cryptoInterestDetails($name){

        $interestName = str_replace('_', ' ', $name);
        $interest =Interest::where('name', $interestName)->first();
        return view('interest.cryptointerest-show')->with('interest', $interest);

    }

    public function viewWallets(){
        $wallets = Wallet::all();
        return view('cryptowallet')->with('wallets', $wallets);
    }

    public function cryptoWalletDetails($name){

        $walletName = str_replace('_', ' ', $name);
        $wallet = Wallet::where('name', $walletName)->first();
        return view('wallet.cryptowallet-show')->with('wallet', $wallet);

    }

    public function donate(){
        return view('donate');
    }

}
