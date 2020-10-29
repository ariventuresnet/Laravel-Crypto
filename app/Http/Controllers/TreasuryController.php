<?php

namespace App\Http\Controllers;

use App\Country;
use App\Treasury;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class TreasuryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $treasuries = Treasury::all();
        return view('treasury.index', compact('treasuries'));
    }

    public function create()
    {
        $countries = Country::select('id','name')->get();
        return view('treasury.create')->with('countries', $countries);
    }

    public function store(Request $request)
    {
        //validate Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:treasuries|max:255',
            'filings' => 'required',
            'country' => 'required',
            'symbol' => 'required',
            'btc_holding' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['country_id'] = $request->country;
        Treasury::create($data);

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Treasury successfully added'));
    }

    public function show(Treasury $treasury)
    {
        return view('treasury.show', compact('treasury'));
    }

    public function edit(Treasury $treasury)
    {
        $countries = Country::select('id','name')->get();
        return view('treasury.edit', compact('treasury', 'countries'));
    }

    public function update(Request $request, Treasury $treasury)
    {
        //get request data
        $data = $request->except("_token", "_method");

        // update database 
        $treasury->update($data);

        //Redirect and show flash message
        return redirect()->route('treasuries.index')->with(session()->flash('alert-success', 'treasury updated successfully'));
    }

    public function destroy(Treasury $treasury)
    {
        $treasury->delete();
        //Redirect and show flash message
        return redirect()->route('treasuries.index')->with(session()->flash('alert-success', 'Treasury successfully Deleted'));

    }

    public function viewTreasuries(){
        $treasuries = Treasury::with('country')->get();
        $countries  = Country::select('name')->get();
        return view('more.companyTreasuries')->with('treasuries',$treasuries)->with('countries', $countries);
    }
    
    public function AjaxRequestForTreasury(Request $request){
        $treasuries = Country::where('name', $request->country)->first()->treasuries;
        return response()->json( [ 'treasuries'=>$treasuries ]);
    }
}
