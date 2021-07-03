<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('layouts.countries.index',compact('countries'));
    }

    public function create(){
        return view('layouts.countries.create');
    }

    public function store(CountryStoreRequest $request, Country $country){
        Country::create($request->validated());
        $notification = array('message'=>'Country Created Successfully', 'alert-type' => 'success');
        return redirect()->route('countries.index')->with($notification);

    }

    public function edit(Country $country){
        return view('layouts.countries.edit',compact('country'));
    }

    public function update(CountryStoreRequest $request,Country $country){
        $country->update($request->validated());
        $notification = array('message'=>'Country Updated Successfully', 'alert-type' => 'success');
        return redirect()->route('countries.index')->with($notification);
    }

    public function destroy(Country $country){
        $country->delete();
        $notification = array('message'=>'Country Deleted Successfully', 'alert-type' => 'success');
        return redirect()->route('countries.index')->with($notification);
    }

}
