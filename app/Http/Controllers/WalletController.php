<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $wallets = Wallet::all();
        return view('wallet.index')->with('wallets', $wallets);
    }

    
    public function create()
    {
        return view('wallet.create');
    }

    public function store(Request $request)
    {
        // validate Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:wallets|max:255',
            'logo' => 'required',
            'url' => 'required',
            'currencies' => 'required',
            'type' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        //store img
        $logo_name='';
        if ($request->hasFile('logo')) {

            $logo= $request->file('logo');
            $logo_name = uniqid('',true).Str::random(10). '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('images', $logo_name );
        }
        
        // store data into database
        $data = $request->except('_token');
        $data["logo"] = $logo_name;
        $data["currencies"] = json_encode($request->currencies);
        $data["type"] = json_encode($request->type);

        Wallet::create($data);

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'New Wallet successfully added'));
    }

    public function show(Wallet $wallet)
    {
        return view('wallet.show')->with('wallet', $wallet);
    }

    public function edit(Wallet $wallet)
    {
        return view('wallet.edit')->with('wallet', $wallet);
    }

    public function update(Request $request, Wallet $wallet)
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
             $isExists = file_exists(public_path('images/'). '/'. $wallet->logo);
             if($isExists){
                 unlink( public_path('images/'). '/'. $wallet->logo );
             }
             
         }
 
         // update database 
         $wallet->update($data);
 
         //Redirect and show flash message
         return redirect()->route('wallets.index')->with(session()->flash('alert-success', 'Wallet successfully updated'));
    }

    public function delete(Wallet $wallet)
    {
        // Delete image
        $isExists = file_exists(public_path('images/'). '/'. $wallet->logo);
        if($isExists){
            unlink( public_path('images/'). '/'. $wallet->logo );
        }
        
        //Delete Data
        $wallet->delete();

        //Redirect and show flash message
        return redirect()->route('wallets.index')->with(session()->flash('alert-success', 'Wallet successfully Deleted'));

    }

}
