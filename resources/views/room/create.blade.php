@extends('layout')
@section('title', 'Add room')
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
<p>Add room to database or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/rooms">
        {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input placeholder="name" required value="{{old('name')}}" name="name" class="form-control {{$errors->has('name') ? 'border border-danger' : ''}}" id="name" type="text" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea required name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}" id="description" >{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" value="{{old('phone')}}" required name="phone" class="form-control {{$errors->has('phone') ? 'border border-danger' : ''}}" id="phone" >
            </div>
            <div class="form-group">
                <label for="department">Department (Change with search-select box)</label>
                <select name="department" class="form-control" id="department">
                    <option value="" selected>Choose department</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="" selected>Choose room type</option>
                    <option value="classroom">classroom</option>
                    <option value="office">office</option>
                </select>
            </div>
            <div class="form-group">
                <label for="number_of_seats">Number of seats</label>
                <input name="number_of_seats" class="form-control" type="number" value="0" id="number_of_seats">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status">
                    <option value="" selected>Choose here</option>
                    <option value="open">open</option>
                    <option value="closed">closed</option>
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