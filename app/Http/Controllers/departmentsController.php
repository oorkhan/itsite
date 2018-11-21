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

    public function store(){
       $department = new Department();

       $department->name = request('departmentName');
       $department->description = request('departmentDescription');

       $department->save();
       return redirect('/departments');
    }
}
