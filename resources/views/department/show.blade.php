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
    <a href="{{ URL::previous() }}">Go Back</a>
</div>



<!-- /.container-fluid -->

@endsection