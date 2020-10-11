<?php

namespace App\Http\Controllers;

use App\Card;
use App\CardMethod;
use App\Collateral;
use App\Country;
use App\Currency;
use App\Deposit;
use App\Exchange;
use App\Interest;
use App\Loan;
use App\Payment;
use App\Wallet;
use App\WalletType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $currencies;
    protected $countries;
    protected $payments;
    protected $collaterals;
    protected $cardMethods;
    protected $deposits;
    protected $walletTypes;

    public function index()
    {
        $exchanges = Exchange::all();
        
        //get suggestion
        // return view('welcome', compact('exchanges', 'currencies', 'countries', 'payments'));
        $this->suggestionForExchange();
        return view('welcome')->with('exchanges', $exchanges)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments);
    }

    public function cryptoExchangeDetails($name){
        
        $exchangeName = str_replace('_', ' ', $name);
        $exchange = Exchange::where('name', $exchangeName)->first();

        $this->suggestionForExchange();
        return view('exchange.details')->with('exchange', $exchange)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments);
    }

    public function viewCards(){
        $cards = Card::all();
        
        $this->suggestionForCard();
        return view('cryptocard')->with('cards', $cards)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('cardMethods', $this->cardMethods);

    }

    public function cryptoCardDetails($name){

        $cardName = str_replace('_', ' ', $name);
        $card = Card::where('name', $cardName)->first();

        $this->suggestionForCard();
        return view('card.details')->with('card', $card)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('cardMethods', $this->cardMethods);
    }

    public function viewLoans(){
        $loans = Loan::all();

        $this->suggestionForLoan();
        return view('cryptoloan')->with('loans', $loans)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('collaterals', $this->collaterals);
    }

    public function cryptoLoanDetails($name){

        $loanName = str_replace('_', ' ', $name);
        $loan = Loan::where('name', $loanName)->first();

        $this->suggestionForLoan();
        return view('loan.details')->with('loan', $loan)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('collaterals', $this->collaterals);
    }

    public function viewInterestAccounts(){
        $interests = Interest::all();

        $this->suggestionForDeposit();
        return view('cryptointerest')->with('interests', $interests)->with('countries', $this->countries)->with('deposits', $this->deposits);
    }

    public function cryptoInterestDetails($name){

        $interestName = str_replace('_', ' ', $name);
        $interest =Interest::where('name', $interestName)->first();

        $this->suggestionForDeposit();
        return view('interest.details')->with('interest', $interest)->with('countries', $this->countries)->with('deposits', $this->deposits);
    }

    public function viewWallets(){
        $wallets = Wallet::all();

        $this->suggestionForWallet();
        return view('cryptowallet')->with('wallets', $wallets)->with('currencies', $this->currencies)->with('walletTypes', $this->walletTypes);
    }

    public function cryptoWalletDetails($name){

        $walletName = str_replace('_', ' ', $name);
        $wallet = Wallet::where('name', $walletName)->first();

        $this->suggestionForWallet();
        return view('wallet.details')->with('wallet', $wallet)->with('currencies', $this->currencies)->with('walletTypes', $this->walletTypes);

    }

    public function donate(){
        return view('donate');
    }


    public function suggestionForExchange(){
        $this->currencies = Currency::select('name')->where('is_exchange', '1')->where('status', '1')->get();
        $this->countries = Country::select('name')->where('is_exchange', '1')->where('status', '1')->get();
        $this->payments = Payment::select('name')->where('status', '1')->get();
    }

    public function suggestionForCard(){
        $this->currencies = Currency::select('name')->where('is_card', '1')->where('status', '1')->get();
        $this->countries = Country::select('name')->where('is_card', '1')->where('status', '1')->get();
        $this->cardMethods = CardMethod::select('name')->where('status', '1')->get();
    }

    public function suggestionForLoan(){
        $this->currencies = Currency::select('name')->where('is_loan', '1')->where('status', '1')->get();
        $this->countries = Country::select('name')->where('is_loan', '1')->where('status', '1')->get();
        $this->collaterals = Collateral::select('name')->where('status', '1')->get();
    }

    public function suggestionForDeposit(){
        $this->countries   = Country::select('name')->where('is_interest', '1')->where('status', '1')->get();
        $this->deposits    = Deposit::select('name')->where('status', '1')->get();
    }

    public function suggestionForWallet(){
        $this->currencies = Currency::select('name')->where('is_wallet', '1')->where('status', '1')->get();
        $this->walletTypes = WalletType::select('name')->where('status', '1')->get();
    }

}
