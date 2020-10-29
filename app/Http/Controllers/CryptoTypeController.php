<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\CryptoType;
use Illuminate\Http\Request;

class CryptoTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cryptoTypes = CryptoType::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = count($cryptoTypes);

        return view('cryptoType.index', compact('cryptoTypes', 'autocomplete_card', 'no_of_cryptos'));
    }

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = CryptoType::get()->count();
        return view('cryptoType.create', compact('autocomplete_card', 'no_of_cryptos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:crypto_types|max:255',
        ]);

        $cryptoType = new CryptoType();
        $cryptoType->name = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $cryptoType->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Crypto Type successfully added'));

    }

    public function edit(CryptoType $cryptoType)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = CryptoType::get()->count();
        return view('cryptoType.edit', compact('cryptoType', 'autocomplete_card', 'no_of_cryptos'));
    }

    public function update(Request $request, CryptoType $cryptoType)
    {
        $cryptoType->name = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $cryptoType->status = $request->status;
        $cryptoType->save();
        return redirect()->route('crypto_types.index')->with(session()->flash('alert-success', 'Crpyto Type successfully updated!!'));
    }

    public function destroy(CryptoType $cryptoType)
    {
        $cryptoType->delete();
        return redirect()->route('crypto_types.index')->with(session()->flash('alert-success', 'Crpyto Type successfully deleted!!'));
    }
}
