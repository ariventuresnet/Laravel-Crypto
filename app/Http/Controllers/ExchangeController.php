<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = Exchange::all();
        return view('exchange.index')->with('exchanges', $exchanges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exchange.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        Exchange::create([
            "name"=> $request->name,
            "logo"=> $logo_name,
            "url" => $request->url,
            "currencies"=> json_encode($request->currencies),
            "countries"=> json_encode($request->countries),
            "payments"=> json_encode($request->payments),
            "description" => $request->description,
            "pros"=> $request->pros,
            "cons"=> $request->cons,
            "ease"=> $request->ease,
            "privacy"=> $request->privacy,
            "speed"=> $request->speed,
            "fee"=> $request->fee,
            "reputation"=> $request->reputation,
            "limit"=> $request->limit,
            "bitcoin_only"=> $request->bitcoin_only,
            "recurring_buys"=> $request->recurring_buys,
            "lightning"=> $request->lightning,
            "liquid"=> $request->liquid,
            "kyc"=> $request->kyc,
        ]);


        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Exchange successfully added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {

        return view('exchange.show')->with('exchange',$exchange);
        // $currencies = unserialize($exchange->currencies);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        return view('exchange.edit')->with('exchange',$exchange);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
