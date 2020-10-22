<?php

namespace App\Http\Controllers;

use App\AutocompleteCard;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = Payment::all();
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();

        return view('payment.index', compact('payments', 'autocomplete_card'));
    }

    public function create()
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('payment.create')->with('autocomplete_card',$autocomplete_card);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:payments|max:255',
        ]);

        $payment = new Payment();
        $payment->name = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $payment->save();

        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_payment_method += 1;
        $autocomplete_card->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Payment Method successfully added'));
    }

    public function edit(Payment $payment)
    {
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        return view('payment.edit', compact('payment', 'autocomplete_card'));
    }

    public function update(Request $request, Payment $payment)
    {
        $data['name'] = ucfirst(str_replace( array( "'", "\"", '`' ), ' ', $request->name));
        $data['status'] = $request->status;

        $payment->update($data);
        return redirect()->route('payments.index')->with(session()->flash('alert-success', 'Payment Method successfully updated!!'));
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        //update Autocomplete_cards table
        $autocomplete_card = AutocompleteCard::where('id', 1)->first();
        $autocomplete_card->no_of_payment_method -= 1;
        $autocomplete_card->save();

        return redirect()->route('payments.index')->with(session()->flash('alert-success', 'Payment Method successfully deleted!!'));
    }
}
