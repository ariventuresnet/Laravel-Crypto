<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class InterestController extends Controller
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
        $interests = Interest::all();
        return view('interest.index')->with('interests', $interests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interest.create');
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
            'name' => 'required|unique:interests|max:255',
            'logo' => 'required',
            'url' => 'required',
            'deposits' => 'required',
            'countries' => 'required',  
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $logo_name='';
        //store img
        if ($request->hasFile('logo')) {

            $logo= $request->file('logo');
            $logo_name = uniqid('',true).Str::random(10). '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('images', $logo_name );
        }
        
        // store data into database
        Interest::create([
            "name"=> $request->name,
            "logo"=> $logo_name,
            "url" => $request->url,
            "deposits"=> json_encode($request->deposits),
            "countries"=> json_encode($request->countries),
            "description" => $request->description,
            "pros"=> $request->pros,
            "cons"=> $request->cons,
            "btc_only"=> $request->btc_only,
            "term"=> $request->term,
            "interest"=> $request->interest,
            "ease"=> $request->ease,
            "privacy"=> $request->privacy,
            "speed"=> $request->speed,
            "fee"=> $request->fee,
            "reputation"=> $request->reputation,
            "limit"=> $request->limit,
        ]);


        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Interest Accounts successfully added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        return view('interest.show')->with('interest', $interest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
