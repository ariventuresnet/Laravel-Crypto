<?php

namespace App\Http\Controllers;

use App\Country;
use App\Deposit;
use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class InterestController extends Controller
{
    protected $countries;
    protected $deposits;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $interests = Interest::all();
        return view('interest.index')->with('interests', $interests);
    }

    public function create()
    {
        $this->selectBoxForInterestAccount();
        return view('interest.create')->with('countries', $this->countries)->with('deposits', $this->deposits);
    }

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
        $data = $request->except('_token');
        $data["logo"] = $logo_name;
        $data["deposits"] = json_encode($request->deposits);
        $data["countries"] = json_encode($request->countries);
        Interest::create($data);

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Interest Accounts successfully added'));
    }

    public function show(Interest $interest)
    {
        return view('interest.show')->with('interest', $interest);
    }

    public function edit(Interest $interest)
    {
        $this->selectBoxForInterestAccount();
        return view('interest.edit')->with('interest',$interest)->with('countries', $this->countries)->with('deposits', $this->deposits);
    }

    public function update(Request $request, Interest $interest)
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
            $isExists = file_exists(public_path('images/'). '/'. $interest->logo);
            if($isExists){
                unlink( public_path('images/'). '/'. $interest->logo );
            }
            
        }

        // update database 
        $interest->update($data);

        //Redirect and show flash message
        return redirect()->route('interests.index')->with(session()->flash('alert-success', 'Interest successfully updated'));
    }

    public function delete(Interest $interest)
    {
        // Delete image
        $isExists = file_exists(public_path('images/'). '/'. $interest->logo);
        if($isExists){
            unlink( public_path('images/'). '/'. $interest->logo );
        }
        
        //Delete Data
        $interest->delete();

        //Redirect and show flash message
        return redirect()->route('interests.index')->with(session()->flash('alert-success', 'Interests Account successfully Deleted'));

    }

    public function selectBoxForInterestAccount(){
        $this->countries = Country::select('name')->where('is_interest', '1')->get();
        $this->deposits  = Deposit::select('name')->get();
    }

    
}
