<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
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
        $cards = Card::all();
        return view('card.card-index')->with('cards', $cards); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('card.card-create');
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
            'name' => 'required|unique:cards|max:255',
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
            $logo_name = uniqid('card_',true).Str::random(10). '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('images', $logo_name );
        }
        
        // store data into database
        Card::create([
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
        ]);


        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Card successfully added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('card.card-show')->with('card',$card);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('card.card-edit')->with('card',$card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //get request data
        $data = $request->except("_token", "_method");
        
        if($request->hasFile('logo')){
            $new_logo= $request->file('logo');
            $new_logo_name = uniqid('logo_',true).Str::random(10). '.' . $new_logo->getClientOriginalExtension();
            $new_logo->storeAs('images', $new_logo_name );
            
            //set new logo unique name
            $data["logo"] = $new_logo_name;

            // Delete Old image
            $isExists = file_exists(public_path('images/'). '/'. $card->logo);
            if($isExists){
                unlink( public_path('images/'). '/'. $card->logo );
            }
            
        }

        // update database 
        $card->update($data);

        //Redirect and show flash message
        return redirect()->route('cards.index')->with(session()->flash('alert-success', 'Card successfully updated'));
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

    public function delete(Card $card)
    {
        // Delete image
        $isExists = file_exists(public_path('images/'). '/'. $card->logo);
        if($isExists){
            unlink( public_path('images/'). '/'. $card->logo );
        }
        
        //Delete Data
        $card->delete();

        //Redirect and show flash message
        return redirect()->route('cards.index')->with(session()->flash('alert-success', 'Card successfully Deleted'));

    }
}
