<?php

namespace App\Http\Controllers;
use App\Room;
use App\Campus;
use App\Employee;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class departmentsController extends Controller
{
    public function index(){
        $departments = Department::all();

        return view('department.index', compact('departments'));
    }
     public function create(){
        $campuses = Campus::all();
        return view('department.create', compact('campuses'));
    }

    // get /departments/1/edit (edit)

    public function edit(Department $department){
        $campuses = Campus::all();
        return view('department.edit', compact('department', 'campuses'));
    }

    // PUT|PATCH | departments/{department}      | departments.update  | App\Http\Controllers\departmentsController@update
    public function update(Department $department){
         $attributes = request()->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:1000',
            'campus_id' => 'integer|exists:campuses,id',
        ]);
        $department->update($attributes);
        Session::flash('success' , 'Department '.$department->name.' has been updated.');
        return redirect(route('departments.show', $department->id));
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:1000',
            'campus_id' => 'integer|exists:campuses,id',
        ]);
        $department = Department::create($attributes);
        Session::flash('success' , 'Department '.$department->name.' has been added.');
        return redirect(route('departments.index'));
    }
    // DELETE    | departments/{department}      | departments.destroy | App\Http\Controllers\departmentsController@destroy
    public function destroy(Department $department){
        $department->delete();
        Session::flash('success' , 'Department '.$department->name.' has been deleted.');
        return redirect(route('departments.index'));
    }
//GET|HEAD  | departments/{department}      | departments.show    | App\Http\Controllers\departmentsController@show
    public function show(Department $department){
        return view('/department.show', compact('department'));
    }

}
