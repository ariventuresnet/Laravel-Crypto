<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countries = Country::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();

        return view('country.index', compact('countries', 'autocomplete_card'));
    }

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('country.create')->with('autocomplete_card',$autocomplete_card);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:countries|max:255',
            'categories' => 'required',
        ]);
        $data['name'] = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['is_exchange'] = in_array("exchange", $request->categories) ? 1 : 0;
        $data['is_card'] = in_array("card", $request->categories) ? 1 : 0;
        $data['is_loan'] = in_array("loan", $request->categories) ? 1 : 0;
        $data['is_interest'] = in_array("interest", $request->categories) ? 1 : 0;

        Country::create($data);

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_country += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Country successfully added'));
    }

    public function edit(Country $country)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('country.edit', compact('country', 'autocomplete_card'));
    }

    public function update(Request $request, Country $country)
    {
        $data['name'] = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['status'] = $request->status;
        $data['is_exchange'] = in_array("exchange", $request->categories) ? 1 : 0;
        $data['is_card'] = in_array("card", $request->categories) ? 1 : 0;
        $data['is_loan'] = in_array("loan", $request->categories) ? 1 : 0;
        $data['is_interest'] = in_array("interest", $request->categories) ? 1 : 0;

        $country->update($data);
        return redirect()->route('countries.index')->with(session()->flash('alert-success', 'Country successfully updated!!'));
    }

    public function destroy(Country $country)
    {
        $country->delete();
        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_country -= 1;
        $autocomplete_card->save();

        return redirect()->route('countries.index')->with(session()->flash('alert-success', 'Country successfully deleted!!'));
    }
}
