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
        <div class="panel panel-primary">
            <div class="panel-heading"><h1>{{$department->name}} department info.</h1></div>
            <hr>
            <div class="panel-body">
                <p>{{$department->description}}</p>
            </div>
        </div>
    </div>
</div>



<!-- /.container-fluid -->
<a href="{{ URL::previous() }}">Go Back</a>
@endsection