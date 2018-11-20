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
}
