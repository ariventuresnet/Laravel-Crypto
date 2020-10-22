<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $currencies = Currency::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();

        return view('currency.index', compact('currencies', 'autocomplete_card'));
    }   

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('currency.create')->with('autocomplete_card',$autocomplete_card);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:currencies|max:255',
            'categories' => 'required',
        ]);
        $data['name'] = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['is_exchange'] = in_array("exchange", $request->categories) ? 1 : 0;
        $data['is_card'] = in_array("card", $request->categories) ? 1 : 0;
        $data['is_loan'] = in_array("loan", $request->categories) ? 1 : 0;
        $data['is_wallet'] = in_array("wallet", $request->categories) ? 1 : 0;

        Currency::create($data);

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_currency += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Currency successfully added'));
    }

    public function edit(Currency $currency)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('currency.edit', compact('currency', 'autocomplete_card'));
    }

    public function update(Request $request, Currency $currency)
    {
        $data['name'] = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['status'] = $request->status;
        $data['is_exchange'] = in_array("exchange", $request->categories) ? 1 : 0;
        $data['is_card'] = in_array("card", $request->categories) ? 1 : 0;
        $data['is_loan'] = in_array("loan", $request->categories) ? 1 : 0;
        $data['is_wallet'] = in_array("wallet", $request->categories) ? 1 : 0;

        $currency->update($data);
        return redirect()->route('currencies.index')->with(session()->flash('alert-success', 'Currency successfully updated!!'));
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_currency -= 1;
        $autocomplete_card->save();

        return redirect()->route('currencies.index')->with(session()->flash('alert-success', 'Currency successfully deleted!!'));
    }
}
