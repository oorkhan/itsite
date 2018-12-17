<?php

namespace App\Http\Controllers;

use App\Room;
use App\Campus;
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
        $campuses = Campus::all();
        $departments = Department::all();
        return view ('room.create', compact('departments', 'campuses'));
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
            'name'=>'required|string|min:2',
            'description'=>'required|min:5',
            'phone' => 'string',
            'campus_id'=>'integer|exists:campuses,id',
            'type' => 'string|required',
            'number_of_seats' => 'integer|not_in:0', //find regex for positive numbers
            'status' => 'string|required',
             ]);
            if($request->department_id !== null)
            {
               $attributes .= request()->validate([ 'department_id'=>'integer|exists:departments,id']);
            }
        $room = Room::create($attributes);
        Session::flash('success' , 'Room '.$room->name.' has been added.');
        return redirect(route('rooms.index'));
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
        $campuses = Campus::all();
        $departments = Department::all();
        return view('room.edit', compact('departments', 'campuses', 'room'));
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
        $attributes = request()->validate([
            'name'=>'required|string|min:2',
            'description'=>'required|min:5',
            'phone' => 'string',
            'type' => 'string|required',
            'number_of_seats' => 'integer|not_in:0', //find regex for positive numbers
            'status' => 'string|required',
            'department_id' => 'exists:departments,id',
             ]);
        $room->update($attributes);
        Session::flash('success' , 'Room '.$room->name.' information has been updated.');
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
        $room->delete();
        Session::flash('success' , 'Room '.$room->name.' has been deleted.');
        return redirect(route('rooms.index'));
    }
}
