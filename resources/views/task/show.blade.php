<?php 
    $employeeFullName = '$employee->name  $employee->surname';
?>
@extends('layout')
@section('title', "$employeeFullName")
@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i> {{$employee->name}} {{$employee->surname}}.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Department</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->surname}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->department->name}}</td>
                <td><span class="{{$employee->status == 1 ? 'text-success' : 'text-danger'}}">{{$employee->status == 1 ? 'Active' : 'Inactive'}}</span></td>
                </tr>      
                </tbody>
                </table>
            </div>
        </div>
        </div>    
    </div>
    @if($employee->tasks->count())
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Tasks from this employee.
                </div>
                <div class="card-body">
                    <div class="table-responsive">                    
                        <table class="table table-bordered">        
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>            
                            </thead>
                            <tbody>
                                @foreach($employee->tasks as $task)
                                <tr>
                                    <td>{{$task->title}}</td> <td>{{$task->description}}</td>                 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>              
            </div>
        </div>
        <div class="col-md-6">
            <h2>Placeholder for descriptions</h2>
        </div>
    @endif   
    <div class="col-md-12">
        <a href="{{ URL::previous() }}" class="btn btn-outline-dark">BACK</a> 
        <a href="{{ $employee->id }}/edit" class="btn btn-warning">EDIT</a>
        <a href="#" onclick="if(confirm('Are you sure?')){$('#deleteform').submit()}" class="btn btn-danger">DELETE</a>
        <form id="deleteform" action="{{route('employees.destroy', $employee->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}            
        </form>
    </div> 
</div>



<!-- /.container-fluid -->

@endsection