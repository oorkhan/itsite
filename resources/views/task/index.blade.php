<?php
use App\Http\Controllers\TaskController;
$createUrl = action('TaskController@create');
?>
@extends('layout')
@section('title', 'Tasks')
@section('content')

<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
    </ol>

        <!-- Page Content -->
    <h1>@yield('title')</h1>
    <hr>
    @include('/messages')
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quo a esse, minima tempora, magni quas obcaecati voluptate vero architecto ex maiores quaerat mollitia cum nostrum adipisci, harum perspiciatis assumenda.</p>
    <div>
    <a class="btn btn-success mb-2" href="{{$createUrl}}">Add Task</a>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>Tasks list.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Employee</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Employee</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td><a href="tasks/{{$task->id}}">{{$task->id}}</a></td>
                    <td><a href="tasks/{{$task->id}}">{{$task->title}}</a></td>
                    <td><a href="tasks/{{$task->id}}">{{$task->description}}</a></td>
                    <td><span class="{{$task->completed == 0 ? 'text-warning' : 'text-success'}}">{{$task->completed == 0 ? 'Inprogress' : 'Completed'}}</span></td>
                    <td><a href="/employees/{{$task->employee->id}}">{{$task->employee->name}} {{$task->employee->surname}}</a></td>
                </tr>
                @endforeach         
                </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>    
    </div>        
</div>
</div>
<!-- /.container-fluid -->
@endsection