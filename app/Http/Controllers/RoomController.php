<?php

namespace App\Http\Controllers;

use App\Room;
use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('room.index', compact('rooms'), compact('employeesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view ('room.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required|string|min:2',
            'description'=>'required|min:5',
            'department'=>'integer|exists:departments,id',
            'type' => 'string|required',
            'number_of_seats' => 'integer|not_in:0', //find regex for positive numbers
            'status' => 'string|required',
             ]);
        Room::create([
            'name'=>request('name'),
            'description'=>request('description'),
            'department_id'=>request('department'),
            'type' => request('type'),
            'number_of_seats' => request('number_of_seats'),
            'status' => request('status'),
            'phone' => request('phone') //find reqex for phone
        ]);
        Session::flash('success' , 'Room has been added.');
        return redirect('\rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $departments = Department::all();
        return view('room.edit', compact('departments'), compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        request()->validate([
            'name'=>'required|string|min:2',
            'description'=>'required|min:5',
            'department'=>'integer|exists:departments,id',
            'type' => 'string|required',
            'number_of_seats' => 'integer|not_in:0', //find regex for positive numbers
            'status' => 'string|required',
             ]);
        $room->update([
            'name'=>request('name'),
            'description'=>request('description'),
            'department_id'=>request('department'),
            'type' => request('type'),
            'number_of_seats' => request('number_of_seats'),
            'status' => request('status'),
            'phone' => request('phone') //find reqex for phone
        ]);
        Session::flash('success' , 'Room information has been updated.');
        return redirect(route('rooms.show', $room->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
