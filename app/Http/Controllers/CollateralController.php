<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\Collateral;
use App\CryptoType;
use Illuminate\Http\Request;

class CollateralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $collaterals = Collateral::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = CryptoType::get()->count();

        return view('collateral.index', compact('collaterals', 'autocomplete_card', 'no_of_cryptos'));
    }


    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = CryptoType::get()->count();
        return view('collateral.create', compact('autocomplete_card','no_of_cryptos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:collaterals|max:255',
        ]);
        $collateral = new Collateral();
        $collateral->name = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $collateral->save();

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_collateral += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Collateral successfully added'));
    }

    public function edit(Collateral $collateral)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $no_of_cryptos = CryptoType::get()->count();
        return view('collateral.edit', compact('collateral', 'autocomplete_card', 'no_of_cryptos'));
    }

    public function update(Request $request, Collateral $collateral)
    {
        $data['name']   = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['status'] = $request->status;

        $collateral->update($data);
        return redirect()->route('collaterals.index')->with(session()->flash('alert-success', 'Collateral successfully updated!!'));
    }

    public function destroy(Collateral $collateral)
    {
        $collateral->delete();
        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_collateral -= 1;
        $autocomplete_card->save();

        return redirect()->route('collaterals.index')->with(session()->flash('alert-success', 'Collateral successfully deleted!!'));
    }
}
