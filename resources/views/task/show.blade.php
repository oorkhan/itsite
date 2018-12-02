<?php 
    $task_id = $task->id;
?>
@extends('layout')
@section('title', "Task ID $task_id")
@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i> Task id: {{$task->id}}. {{$task->title}}.
            <form method="POST" action="">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="checkbox">
                <label for="completed"><input type="checkbox" name="completed" onChange="this.form.submit()"> Complete this task.</label>
                </div>
            <form>    
            </div>
            <div class="card-body">
                <p>Employee: <a href="/employees/{{$task->employee_id}}">{{$task->employee->name}} {{$task->employee->surname}}</a></p>
                <p>{{$task->description}}</p>
            </div>
        </div>
        </div>    
    </div>
    <div class="col-md-12">
        <a href="{{ URL::previous() }}" class="btn btn-outline-dark">BACK</a> 
        <a href="{{ $task->id }}/edit" class="btn btn-warning">EDIT</a>
        <a href="#" onclick="if(confirm('Are you sure?')){$('#deleteform').submit()}" class="btn btn-danger">DELETE</a>
        <form id="deleteform" action="{{route('tasks.destroy', $task->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}            
        </form>
    </div> 
</div>



<!-- /.container-fluid -->

@endsection