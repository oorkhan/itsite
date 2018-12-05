<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Room;
use App\Employee;
use App\Department;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $departments = Department::all();
        return view('employee.create', compact('departments'),compact('rooms'));
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
            'employeeName' => 'required|min:3|max:50',
            'employeeSurname' => 'required|min:3|max:50',
            'email' => 'required',
            'phone' => 'required|min:3|max:50',
            'department' => 'integer|exists:departments,id',
            'room' => 'integer|exists:rooms,id',
        ]);
        Employee::create([
            'name'=> request('employeeName'),
            'surname'=> request('employeeSurname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'department_id' => request('department'),
            'room_id' => request('room'),
            'status' => request('status'),
        ]);
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employee.edit', compact('employee'), compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee)
    {
        $employee->update([
            'name' => request('employeeNameInput'),
            'surname' => request('employeeSurnameInput'),
            'phone' => request('phone'),
            'email' => request('email'),
            'department_id' => request('department'),
            'status' => request('status'),
        ]);
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees');
    }
}
