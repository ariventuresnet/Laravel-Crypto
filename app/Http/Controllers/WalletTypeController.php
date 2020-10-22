<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\Wallet;
use App\WalletType;
use Illuminate\Http\Request;

class WalletTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $walletTypes = WalletType::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();

        return view('walletType.index', compact('walletTypes', 'autocomplete_card'));
    }

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('walletType.create')->with('autocomplete_card',$autocomplete_card);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:wallet_types|max:255',
        ]);

        $walletType = new WalletType();
        $walletType->name = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $walletType->save();

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_wallet += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Payment Method successfully added'));
    }

    public function edit(WalletType $wallet_type)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('walletType.edit', compact('wallet_type', 'autocomplete_card'));
    }

    public function update(Request $request, WalletType $wallet_type)
    {
        $data['name']   = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['status'] = $request->status;

        $wallet_type->update($data);
        return redirect()->route('wallet_types.index')->with(session()->flash('alert-success', 'Wallet Type successfully updated!!'));
    }

    public function destroy(WalletType $wallet_type)
    {
        $wallet_type->delete();
        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_wallet -= 1;
        $autocomplete_card->save();

        return redirect()->route('wallet_types.index')->with(session()->flash('alert-success', 'Wallet Type successfully deleted!!'));
    }
}
