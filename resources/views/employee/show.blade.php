<?php 
    $departmentName = $department->name;
?>
@extends('layout')
@section('title', "$departmentName")
@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    {{$department->name}} department info.
                </div>
                <div class="card-body">
                    <h2>Description:</h2>
                    <p>{{$department->description}}</p>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>    
        </div>        
    </div>
    @if($department->employees->count())
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>{{$department->name}} employees list.
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
                </tr>
                </thead>
                <tfoot>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($department->employees as $employee)
                <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->surname}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
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
    @endif    
    <a href="{{ URL::previous() }}">Go Back</a>
</div>



<!-- /.container-fluid -->

@endsection