<?php

namespace App\Http\Controllers;

use App\Task;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('task.create', compact('employees'));
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
            'title'=>'required|string|min:5',
            'description'=>'required|min:5',
            'employee'=>'integer|exists:employees,id',
             ]);
        Task::create([
            'title'=>request('title'),
            'description'=>request('description'),
            'employee_id'=>request('employee'),
        ]);
        Session::flash('success' , 'Task has been added.');
        return redirect('\tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $employees = Employee::all();
        return view('task.edit', compact('task'), compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {         
        request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'employee'=> 'exists:employees,id',
            'status'=>'boolean',
        ]);
        $task->update([
            'title' => request('title'),
            'description' => request('description'),
            'employee_id' => request('employee'),
            'completed' => request('status'),
        ]);
        Session::flash('success' , 'Task has been updated.');
        return redirect('/tasks');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        Session::flash('success', 'The task has been deleted.');
        return redirect('/tasks');
    }
    public function completeTask(Task $task){
        $task->update([
            'completed' => request()->has('completed')
        ]);
        Session::flash('success', 'You have updated task.');
        return redirect('/tasks');
    }
}
