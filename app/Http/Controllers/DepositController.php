<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $deposits = Deposit::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();

        return view('deposit.index', compact('deposits', 'autocomplete_card'));
    }

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('deposit.create')->with('autocomplete_card',$autocomplete_card);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:deposits|max:255',
        ]);
        $deposit = new Deposit();
        $deposit->name = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $deposit->save();

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_deposit += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Deposit successfully added'));
    }

    public function edit(Deposit $deposit)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('deposit.edit', compact('deposit', 'autocomplete_card'));
    }

    public function update(Request $request, Deposit $deposit)
    {
        $data['name']   = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['status'] = $request->status;

        $deposit->update($data);
        return redirect()->route('deposits.index')->with(session()->flash('alert-success', 'Deposit successfully updated!!'));
    }

    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_deposit -= 1;
        $autocomplete_card->save();

        return redirect()->route('deposits.index')->with(session()->flash('alert-success', 'Deposit successfully deleted!!'));
    }
}
