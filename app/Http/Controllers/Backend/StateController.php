<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::join('countries', 'states.country_id','=','countries.id')->get(['states.id','states.name','country_id','country_code','countries.name AS country_name']);


        return view('layouts.states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('layouts.states.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());
        $notification = array('message'=>'State Created Successfully', 'alert-type' => 'success');
        return redirect()->route('states.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('layouts.states.edit',compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
           'country_id' => $request->country_id,
           'name' => $request->name
        ]);
        $notification = array('message'=>'State Updated Successfully', 'alert-type' => 'success');
        return redirect()->route('states.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        $notification = array('message'=>'State Deleted Successfully', 'alert-type' => 'success');
        return redirect()->route('states.index')->with($notification);
    }
}
