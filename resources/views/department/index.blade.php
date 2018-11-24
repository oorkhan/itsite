<?php
use App\Http\Controllers\departmentsController;
$createUrl = action('departmentsController@create');
?>
@extends('layout')
@section('title', 'Departments')
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
<a class="btn btn-success mb-2" href="{{$createUrl}}">Add department</a>
</div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        @yield('title') list</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Details</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Details</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($departments as $department)
            <tr>
                <td><a href="/departments/{{$department->id}}">{{$department->name}}</a></td>
                <td><a href="/departments/{{$department->id}}/edit" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="/departments/{{$department->id}}" method="POST">
                    {{method_field('DELETE')}}
                    {{CSRF_field()}}
                    <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
                <td><a href="/departments/{{$department->id}}" class="btn btn-primary">Details</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection