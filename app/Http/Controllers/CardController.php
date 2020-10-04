<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cards = Card::all();
        return view('card.index')->with('cards', $cards); 
    }

    public function create()
    {
        return view('card.create');
    }

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
        $data = $request->except('_token');
        $data["logo"] = $logo_name;
        $data["currencies"] = json_encode($request->currencies);
        $data["countries"] = json_encode($request->countries);
        $data["payments"] = json_encode($request->payments);
        Card::create($data);

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Card successfully added'));
    }

    public function show(Card $card)
    {
        return view('card.show')->with('card',$card);
    }

    public function edit(Card $card)
    {
        return view('card.edit')->with('card',$card);
    }

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
