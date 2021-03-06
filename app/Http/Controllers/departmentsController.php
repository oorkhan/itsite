<?php

namespace App\Http\Controllers;
use App\Room;
use App\Employee;
use App\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class departmentsController extends Controller
{
    public function index(){
        $departments = Department::all();
       
        return view('department.index', compact('departments'));
    }
     public function create(){
       
        return view('department.create');
    }

    // get /departments/1/edit (edit)

    public function edit(Department $department){
        return view('department.edit', compact('department'));
    }

    // PUT|PATCH | departments/{department}      | departments.update  | App\Http\Controllers\departmentsController@update
    public function update(Department $department){
        $department->update([
            'name'=> request('name'),
            'description' => request('description')
        ]);
        // $department->name = request('departmentName');
        // $department->description = request('departmentDescription');
        // $department->save();
        return redirect('/departments');
    }

    public function store(){
        request()->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:255',
        ]);
        Department::create([
            'name'=> request('name'),
            'description' => request('description')
        ]);

    //    $department = new Department();
    //    $department->name = request('departmentName');
    //    $department->description = request('departmentDescription');
    //    $department->save();
       return redirect('/departments');
    }
    // DELETE    | departments/{department}      | departments.destroy | App\Http\Controllers\departmentsController@destroy
    public function destroy(Department $department){
        $department->delete();
        return redirect('/departments');
    }
//GET|HEAD  | departments/{department}      | departments.show    | App\Http\Controllers\departmentsController@show
    public function show(Department $department){
        return view('/department.show', compact('department'));
    }

}
