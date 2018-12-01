@extends('layout')
@section('title', 'Add task')
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
<p>Add task to database or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/task">
        {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input placeholder="title" required value="{{old('title')}}" name="title" class="form-control {{$errors->has('title') ? 'border border-danger' : ''}}" id="title" type="text" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input placeholder="description" required value="{{old('description')}}" name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}" id="description" type="text" >
            </div>
            <div class="form-group">
                <label for="employee">Employee (Change with search-select box)</label>
                <select name="employee" class="form-control" id="employee">
                    <option value="" selected>Choose here</option>
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}} {{$employee->surname}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning mb-2">Save</button>
        </form>
        </div>
    @if($errors->any())
    <div class="col-md-4 alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif    
</div>

<!-- /.container-fluid -->
@endsection