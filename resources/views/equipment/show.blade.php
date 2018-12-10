@extends('layout')
@section('title', 'Equipment')
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
    <h1>{{$equipmentType->name}} <a href="#" class="btn btn-warning">Edit</a> <a href="#" class="btn btn-danger">Delete</a></h1>
    <hr>

</div>
<!-- /.container-fluid -->
@endsection