<?php

namespace App\Http\Controllers;

use App\Card;
use App\CardMethod;
use App\Category;
use App\Collateral;
use App\Country;
use App\Currency;
use App\Deposit;
use App\Exchange;
use App\Interest;
use App\Loan;
use App\Payment;
use App\Post;
use App\Wallet;
use App\WalletType;
use Illuminate\Http\Request;

class CryptoController extends Controller
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

        // $posts = Post::with('category')->get();
        // $posts = Post::with('category')->select('id', 'title', 'slug', 'sub_title','content', 'img', 'created_at')->whereHas('category', function($query){
        //     $query->where('name','=','exchange');
        // })->get();

        //get user IP address
        $ipaddress = $this->get_client_ip();
        //return $ipaddress;
        $posts = Category::where('name', 'exchange')->first()->posts;
        $this->suggestionForExchange();
        return view('welcome')->with('exchanges', $exchanges)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments)->with('posts', $posts);
    }

    public function cryptoExchangeDetails($name){
        
        $exchangeName = str_replace('_', ' ', $name);
        $exchange = Exchange::where('name', $exchangeName)->first();

        $this->suggestionForExchange();
        return view('exchange.details')->with('exchange', $exchange)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments);
    }

    public function PostOfExchange($slug){
        $specificPost = Post::where('slug', $slug)->first();
        $posts = Post::select('id', 'title', 'slug', 'sub_title','content', 'img', 'created_at')->get();
        return view('exchange.specificPost', compact('specificPost', 'posts') );
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


    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}
