<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Project;
class ProjectJobsController extends Controller
{
    public function store(Project $project){
        $attributes = request()->validate(['description' => 'required|min:4']);
        $project->addJob($attributes);
        return back();
    }
    public function update (Job $job){     
        // $job->update([
        //     'completed' => request()->has('completed')
        // ]);
        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $job->$method();
        return back();
    }
}
