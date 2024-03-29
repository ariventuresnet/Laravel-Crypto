<?php

namespace App\Http\Controllers;

use App\Country;
use App\Currency;
use App\Exchange;
use App\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    protected $currencies;
    protected $countries;
    protected $payments;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $exchanges = Exchange::all();
        return view('exchange.index')->with('exchanges', $exchanges);
    }

    public function create()
    {
        $this->selectBoxForExchange();
        return view('exchange.create')->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments);
    }

    public function store(Request $request)
    { 
        // validate Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:exchanges|max:255',
            'logo' => 'required',
            'url' => 'required',
            'currencies' => 'required',
            'countries' => 'required',
            'payments' => 'required',
            
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $logo_name='';
        //store img
        if ($request->hasFile('logo')) {

            $logo= $request->file('logo');
            $logo_name = uniqid('logo_',true).Str::random(10). '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('images', $logo_name );
        }

        // store data into database
        $data = $request->except('_token');
        $data["logo"] = $logo_name;
        $data["currencies"] = json_encode($request->currencies);
        $data["countries"] = json_encode($request->countries);
        $data["payments"] = json_encode($request->payments);
        Exchange::create($data);

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Exchange successfully added'));

        /*
        $logo= $request->file('logo');
        $logo->storeAs('images', $logo->getClientOriginalName() );
        return "uploded";
        */
    }

    public function show(Exchange $exchange)
    {

        return view('exchange.show')->with('exchange',$exchange);
        // $currencies = unserialize($exchange->currencies);

    }

    public function edit(Exchange $exchange)
    {
        $this->selectBoxForExchange();
        return view('exchange.edit')->with('exchange',$exchange)->with('currencies', $this->currencies)->with('countries', $this->countries)->with('payments', $this->payments);
    }

    public function update(Request $request, Exchange $exchange)
    {
        //get request data
        $data = $request->except("_token", "_method");

        if($request->hasFile('logo')){
            $new_logo= $request->file('logo');
            $new_logo_name = uniqid('logo_',true).Str::random(10). '.' . $new_logo->getClientOriginalExtension();
            $new_logo->storeAs('images', $new_logo_name );
            
            //set new logo name
            $data["logo"] = $new_logo_name;

            // Delete Old image
            $isExists = file_exists(public_path('images/'). '/'. $exchange->logo);
            if($isExists){
                unlink( public_path('images/'). '/'. $exchange->logo);
            }
            
        }

        // update database 
        $exchange->update($data);

        //Redirect and show flash message
        return redirect()->route('exchanges.index')->with(session()->flash('alert-success', 'Exchange update successfully'));

    }


    public function delete(Exchange $exchange)
    {
        // Delete image
        $isExists = file_exists(public_path('images/'). '/'. $exchange->logo);
        if($isExists){
            unlink( public_path('images/'). '/'. $exchange->logo);
        }
        
        //Delete Data
        $exchange->delete();

        //Redirect and show flash message
        return redirect()->route('exchanges.index')->with(session()->flash('alert-success', 'Exchange successfully Deleted'));

    }


    public function selectBoxForExchange(){
        $this->currencies = Currency::select('name')->where('is_exchange', '1')->get();
        $this->countries  = Country::select('name')->where('is_exchange', '1')->get();
        $this->payments   = Payment::select('name')->get();
    }
}
