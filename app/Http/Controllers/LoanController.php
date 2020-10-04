<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loans = Loan::all();
        return view('loan.index')->with('loans', $loans);
    }

    public function create()
    {
        return view('loan.create');
    }

    public function store(Request $request)
    {
        // validate Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:loans|max:255',
            'logo' => 'required',
            'url' => 'required',
            'currencies' => 'required',
            'countries' => 'required',
            'collaterals' => 'required',
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
        $data["currencies"] = json_encode($request->currencies);
        $data["countries"] = json_encode($request->countries);
        $data["collaterals"] = json_encode($request->collaterals);
        Loan::create($data);

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'New Loan successfully added'));
    }

    public function show(Loan $loan)
    {
        return view('loan.show')->with('loan', $loan);
    }

    public function edit( Loan $loan )
    {
        return view('loan.edit')->with('loan', $loan);
    }

    public function update(Request $request, Loan $loan)
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
            $isExists = file_exists(public_path('images/'). '/'. $loan->logo);
            if($isExists){
                unlink( public_path('images/'). '/'. $loan->logo );
            }
            
        }

        // update database 
        $loan->update($data);

        //Redirect and show flash message
        return redirect()->route('loans.index')->with(session()->flash('alert-success', 'Loan successfully updated'));
    }

    public function delete(Loan $loan)
    {
        // Delete image
        $isExists = file_exists(public_path('images/'). '/'. $loan->logo);
        if($isExists){
            unlink( public_path('images/'). '/'. $loan->logo );
        }
        
        //Delete Data
        $loan->delete();

        //Redirect and show flash message
        return redirect()->route('loans.index')->with(session()->flash('alert-success', 'Loan successfully Deleted'));

    }
}
