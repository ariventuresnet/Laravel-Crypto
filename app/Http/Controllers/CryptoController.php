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
use Stevebauman\Location\Facades\Location;
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
        //get user Location
        $location = $this->clientLocation();

        //get default exchanges
        $exchanges = Exchange::where('countries', 'like', '%'.$location.'%')->get();

        // $posts = Post::with('category')->get();
        // $posts = Post::with('category')->select('id', 'title', 'slug', 'sub_title','content', 'img', 'created_at')->whereHas('category', function($query){
        //     $query->where('name','=','exchange');
        // })->get();

        $posts["exchange"]= Category::where('name', 'exchange')->first()->posts;
        $posts["card"]= Category::where('name', 'card')->first()->posts;
        $posts["loan"]= Category::where('name', 'loan')->first()->posts;
        $posts["interest"]= Category::where('name', 'interest account')->first()->posts;
        $posts["wallet"]= Category::where('name', 'wallet')->first()->posts;

        $this->suggestionForExchange();
        return view('welcome')->with('exchanges', $exchanges)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments)->with('posts', $posts);
    }

    public function dashboard(){
        $no_of_exchanges = Exchange::count();
        $no_of_posts = Post::count();
        $last_post = Post::latest()->first();
        return view('dashboard', compact('no_of_exchanges', 'no_of_posts','last_post'));
    }

    //exchanges
    public function cryptoExchangeDetails($name){
        
        $exchangeName = str_replace('_', ' ', $name);
        $exchange = Exchange::where('name', $exchangeName)->first();

        $this->suggestionForExchange();
        return view('exchange.details')->with('exchange', $exchange)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments);
    }

    public function PostOfExchange($slug){
        $specificPost = Post::where('slug', $slug)->first();
        $posts = Category::where('name', 'exchange')->first()->posts;
        return view('exchange.specific_post', compact('specificPost', 'posts') );
    }

    //Cards
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

    public function PostOfCard($slug){
        $specificPost = Post::where('slug', $slug)->first();
        $posts = Category::where('name', 'card')->first()->posts;
        return view('card.specific_post', compact('specificPost', 'posts') );
    }

    //Loans
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

    public function PostOfLoan($slug){
        $specificPost = Post::where('slug', $slug)->first();
        $posts = Category::where('name', 'loan')->first()->posts;
        return view('loan.specific_post', compact('specificPost', 'posts') );
    }

    //Interest Accounts
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

    public function PostOfInterest($slug){
        $specificPost = Post::where('slug', $slug)->first();
        $posts = Category::where('name', 'interest account')->first()->posts;
        return view('interest.specific_post', compact('specificPost', 'posts') );
    }

    //Wallets
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

    public function PostOfWallet($slug){
        $specificPost = Post::where('slug', $slug)->first();
        $posts = Category::where('name', 'wallet')->first()->posts;
        return view('wallet.specific_post', compact('specificPost', 'posts') );
    }

    
    public function donate(){
        return view('donate');
    }

    //get Location
    public function clientLocation(){
        // $ipaddress = \Request::ip();
        $position = Location::get('43.245.120.182');
        // $position = Location::get();
        return strtolower($position->countryName);

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


    //search exchange
    public function AjaxRequestForExchange(Request $request){
        $currency = strtolower($request->currency);
        $country  = strtolower($request->country);
        $payment  = strtolower($request->payment_method);

        $exchanges = Exchange::where('currencies', 'like', '%'.$currency.'%')->where('countries', 'like', '%'.$country.'%')->where('payments', 'like', '%'.$payment.'%')->get();
        return response()->json( [ 'exchanges'=>$exchanges ]);

    }

    public function searchExchange(Request $request){
        if( ! isset($request->currency, $request->country , $request->payment_method) )
        {
            return redirect()->back();
        }
        $currency = strtolower($request->currency);
        $country  = strtolower($request->country);
        $payment  = strtolower($request->payment_method);

        $exchanges = Exchange::where('currencies', 'like', '%'.$currency.'%')->where('countries', 'like', '%'.$country.'%')->where('payments', 'like', '%'.$payment.'%')->get();
        $this->suggestionForExchange();
        
        //get Post of all categories
        $posts["exchange"]= Category::where('name', 'exchange')->first()->posts;
        $posts["card"]= Category::where('name', 'card')->first()->posts;
        $posts["loan"]= Category::where('name', 'loan')->first()->posts;
        $posts["interest"]= Category::where('name', 'interest account')->first()->posts;
        $posts["wallet"]= Category::where('name', 'wallet')->first()->posts;

        return view('welcome')->with('exchanges', $exchanges)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments)->with('posts', $posts);
        
    }

    //search card
    public function AjaxRequestForCard(Request $request){
        $currency = strtolower($request->currency);
        $country  = strtolower($request->country);
        $card_method  = strtolower($request->card_method);

        $cards = Card::where('currencies', 'like', '%'.$currency.'%')->where('countries', 'like', '%'.$country.'%')->where('payments', 'like', '%'.$card_method.'%')->get();
        return response()->json( [ 'cards'=>$cards ]);

    }

    public function searchCard(Request $request){
        if( ! isset($request->currency, $request->country , $request->card_method) )
        {
            return redirect()->back();
        }
        $currency = strtolower($request->currency);
        $country  = strtolower($request->country);
        $card_method  = strtolower($request->card_method);

        $cards = Card::where('currencies', 'like', '%'.$currency.'%')->where('countries', 'like', '%'.$country.'%')->where('payments', 'like', '%'.$card_method.'%')->get();
        $this->suggestionForCard();
        return view('cryptocard')->with('cards', $cards)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('cardMethods', $this->cardMethods);
        
    }

    //search Loan
    public function AjaxRequestForLoan(Request $request){
        $currency = strtolower($request->currency);
        $country  = strtolower($request->country);
        $collateral  = strtolower($request->collateral);

        $loans = Loan::where('currencies', 'like', '%'.$currency.'%')->where('countries', 'like', '%'.$country.'%')->where('collaterals', 'like', '%'.$collateral.'%')->get();
        return response()->json( [ 'loans'=>$loans ]);

    }

    public function searchLoan(Request $request){
        if( ! isset($request->currency, $request->country , $request->collateral) )
        {
            return redirect()->back();
        }
        $currency = strtolower($request->currency);
        $country  = strtolower($request->country);
        $collateral  = strtolower($request->collateral);

        $loans = Loan::where('currencies', 'like', '%'.$currency.'%')->where('countries', 'like', '%'.$country.'%')->where('collaterals', 'like', '%'.$collateral.'%')->get();
        $this->suggestionForLoan();
        return view('cryptoloan')->with('loans', $loans)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('collaterals', $this->collaterals);
        
    }

    //search Interest Account
    public function AjaxRequestForInterest(Request $request){
        $deposit = strtolower($request->deposit);
        $country  = strtolower($request->country);

        $interests = Interest::where('deposits', 'like', '%'.$deposit.'%')->where('countries', 'like', '%'.$country.'%')->get();
        return response()->json( [ 'interests'=>$interests ]);

    }

    public function searchInterest(Request $request){
        if( ! isset($request->deposit, $request->country) )
        {
            return redirect()->back();
        }
        $deposit = strtolower($request->deposit);
        $country  = strtolower($request->country);

        $interests = Interest::where('deposits', 'like', '%'.$deposit.'%')->where('countries', 'like', '%'.$country.'%')->get();
        $this->suggestionForDeposit();
        return view('cryptointerest')->with('interests', $interests)->with('countries', $this->countries)->with('deposits', $this->deposits);
        
    }

    //search Wallet
    public function AjaxRequestForWallet(Request $request){
        $currency = strtolower($request->currency);
        $wallet_type  = strtolower($request->wallet_type);

        $wallets = Wallet::where('currencies', 'like', '%'.$currency.'%')->where('type', 'like', '%'.$wallet_type.'%')->get();
        return response()->json( [ 'wallets'=>$wallets ]);

    }

    public function searchWallet(Request $request){
        if( ! isset($request->currency, $request->wallet_type) )
        {
            return redirect()->back();
        }
        $currency = strtolower($request->currency);
        $wallet_type  = strtolower($request->wallet_type);
        
        $wallets = Wallet::where('currencies', 'like', '%'.$currency.'%')->where('type', 'like', '%'.$wallet_type.'%')->get();
        $this->suggestionForWallet();
        return view('cryptowallet')->with('wallets', $wallets)->with('currencies', $this->currencies)->with('walletTypes', $this->walletTypes);
        
    }

}
