<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\CardMethod;
use Illuminate\Http\Request;

class CardMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $card_methods = CardMethod::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();

        return view('cardmethod.index', compact('card_methods', 'autocomplete_card'));
    }

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('cardmethod.create')->with('autocomplete_card',$autocomplete_card);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:card_methods|max:255',
        ]);

        $card_method = new CardMethod();
        $card_method->name = $request->name;
        $card_method->save();

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_card_method += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Card Method successfully added'));
    }

    public function edit(CardMethod $cardmethod)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('cardmethod.edit', compact('cardmethod', 'autocomplete_card'));
    }

    public function update(Request $request, CardMethod $cardmethod)
    {
        $data['name'] = ucfirst($request->name);
        $data['status'] = $request->status;

        $cardmethod->update($data);
        return redirect()->route('cardmethods.index')->with(session()->flash('alert-success', 'Card Method successfully updated!!'));
    }

    public function destroy(CardMethod $cardmethod)
    {
        $cardmethod->delete();
        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_card_method -= 1;
        $autocomplete_card->save();

        return redirect()->route('cardmethods.index')->with(session()->flash('alert-success', 'Card Method successfully deleted!!'));
    }
}
