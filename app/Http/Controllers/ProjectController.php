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

    public function create(){
        return view('project.create');
    }
    public function store(){
        $attributes = request()->validate([
            'title' => 'required|min:3',
            'description' =>'required|min:3',
        ]);
        Project::create($attributes);
        return redirect('/projects');
    }
    public function edit(Project $project){
        return view('project.edit', compact('project'));
    }

    public function update(Project $project){
        $attributes =  request()->validate([
            'title' => 'required|min:3',
            'description' =>'required|min:3',
        ]);
        $project->update($attributes);
        return redirect('/projects');
    }
    public function destroy(Project $project){
        $project->delete();
        return redirect('/projects');
    }
    public function show(Project $project){
        return view('project.show',compact('project'));
    }
}
