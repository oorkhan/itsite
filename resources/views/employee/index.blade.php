<?php
use App\Http\Controllers\employeesController;
$createUrl = action('employeesController@create');
?>
@extends('layout')
@section('title', 'Employees')
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
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quo a esse, minima tempora, magni quas obcaecati voluptate vero architecto ex maiores quaerat mollitia cum nostrum adipisci, harum perspiciatis assumenda.</p>
    <div>
    <a class="btn btn-success mb-2" href="{{$createUrl}}">Add Employee</a>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>Employees list.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Department</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Department</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($employees as $employee)
                <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->surname}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->department->name}}</td>
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
  
    <a href="{{ URL::previous() }}">Go Back</a>
</div>
<!-- /.container-fluid -->
@endsection