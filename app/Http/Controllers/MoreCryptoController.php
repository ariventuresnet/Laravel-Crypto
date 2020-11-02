<?php

namespace App\Http\Controllers;

use App\Crypto;
use App\CryptoType;
use App\Currency;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MoreCryptoController extends Controller
{

    public function index()
    {
        $cryptos = Crypto::with('currency', 'cryptoType')->get();
        return view('cryptos.index', compact('cryptos'));
    }

    public function create()
    {
        $currencies = Currency::select('id','name')->get();
        $crypto_types = CryptoType::select('id', 'name')->get();
        return view('cryptos.create')->with('currencies', $currencies)->with('crypto_types',$crypto_types);
    }

    public function store(Request $request)
    {
        //validate Data
        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'crypto_type' => 'required',
            'market_cap' => 'required',
            'algorithm' => 'required',
            'dominance' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $crypto = new Crypto();
        $crypto->currency_id    = $request->currency;
        $crypto->crypto_type_id = $request->crypto_type;
        $crypto->market_cap     = $request->market_cap;
        $crypto->algorithm      = $request->algorithm;
        $crypto->dominance      = $request->dominance;

        $crypto->save();

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Crypto successfully added'));
    }


    public function show(Crypto $crypto)
    {
        return view('cryptos.show', compact('crypto'));
    }


    public function edit(Crypto $crypto)
    {
        $currencies = Currency::select('id','name')->get();
        $crypto_types = CryptoType::select('id', 'name')->get();
        return view('cryptos.edit', compact('crypto', 'currencies', 'crypto_types'));
    }

    public function update(Request $request, Crypto $crypto)
    {
        //validate Data
        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'crypto_type' => 'required',
            'market_cap' => 'required',
            'algorithm' => 'required',
            'dominance' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $crypto->currency_id    = $request->currency;
        $crypto->crypto_type_id = $request->crypto_type;
        $crypto->market_cap     = $request->market_cap;
        $crypto->algorithm      = $request->algorithm;
        $crypto->dominance      = $request->dominance;

        $crypto->save();

        //Redirect and show flash message
         return redirect()->route('cryptos.index')->with(session()->flash('alert-success', 'Crypto updated successfully'));
    }

    public function destroy(Crypto $crypto)
    {
        $crypto->delete();
        return redirect()->route('cryptos.index')->with(session()->flash('alert-success', 'Crypto successfully Deleted'));
    }

    public function viewCryptos(){
        $currencies  = Currency::select('name')->get();
        $types  = CryptoType::select('name')->get();
        $cryptos = Crypto::with('currency', 'cryptoType')->get();
        return view('more.crypto')->with('cryptos',$cryptos)->with('currencies', $currencies)->with('types', $types);
    }

    public function AjaxRequestForCrypto(Request $request){
        $currency   = Currency::select('id')->where('name', $request->name)->first();
        $cryptoType = CryptoType::select('id')->where('name', $request->type)->first();
        $cryptoLists = Crypto::where('currency_id', $currency->id)->where('crypto_type_id', $cryptoType->id)->get();
        return response()->json( [ 'cryptoLists'=>$cryptoLists ]);
    }

    public function AjaxRequestForCrypto2($name,$type ){
        $currency  = Currency::select('id')->where('name', $name)->first();
        $cryptoType = CryptoType::select('id')->where('name', $type)->first();
        $cryptoLists = Crypto::where('currency_id', $currency->id)->where('crypto_type_id', $cryptoType->id)->get();
        // return response()->json( [ 'cryptoLists'=>$cryptoLists ]);
        return $cryptoLists;
    }
    
}
