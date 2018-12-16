<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::all();
        return view('campus.index', compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:4',
            'description'=> 'required|min:4',
            'address' => 'required|min:4',
        ]);
        $attributes['status'] = $request->status;
        $campus = Campus::create($attributes);
        Session::flash('success' , 'Campus '.$campus->name.' has been added.');
        return redirect(route('campuses.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        return view('campus.show', compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        return view('campus.edit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $attributes = request()->validate([
            'name' => 'required|min:4',
            'description'=> 'required|min:4',
            'address' => 'required|min:4',
        ]);
        $attributes['status'] = $request->status;
        $campus->update($attributes);
        Session::flash('success' , 'Campus '.$campus->name.' has been edited.');
        return redirect(route('campuses.show', $campus->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();
        Session::flash('success' , 'Campus '.$campus->name.' has been deleted.');
        return redirect(route('campuses.index'));
    }
}
