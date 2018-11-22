<?php

namespace App\Http\Controllers;
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

    public function edit($id){
        $department = department::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    // PUT|PATCH | departments/{department}      | departments.update  | App\Http\Controllers\departmentsController@update
    public function update($id){
        $department = department::findOrFail($id);
        $department->name = request('departmentName');
        $department->description = request('departmentDescription');
        $department->save();
        return redirect('/departments');
    }

    public function store(){
       $department = new Department();
       $department->name = request('departmentName');
       $department->description = request('departmentDescription');
       $department->save();
       return redirect('/departments');
    }
    // DELETE    | departments/{department}      | departments.destroy | App\Http\Controllers\departmentsController@destroy
    public function destroy($id){
        $department = department::findOrFail($id);
        $department->delete();
        return redirect('/departments');
    }

}
