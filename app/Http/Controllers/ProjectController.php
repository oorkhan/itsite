<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }
}
