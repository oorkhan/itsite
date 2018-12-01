@extends('layout')
@section('title', 'Add employee')
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
<p>Add employee to database or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/employees">
        {{csrf_field()}}
            <div class="form-group">
                <label for="employeeNameInput">Name</label>
                <input placeholder="Name" required value="{{old('employeeName')}}" name="employeeName" class="form-control {{$errors->has('employeeName') ? 'border border-danger' : ''}}" id="employeeNameInput" type="text" >
            </div>
            <div class="form-group">
                <label for="employeeSurnameInput">Surname</label>
                <input placeholder="Surname" required value="{{old('employeeSurname')}}" name="employeeSurname" class="form-control {{$errors->has('employeeSurname') ? 'border border-danger' : ''}}" id="employeeSurnameInput" type="text" >
            </div>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input name="email" type="email" class="form-control {{$errors->has('email') ? 'border border-danger' : ''}}" id="inputEmail4" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" type="text" class="form-control {{$errors->has('phone') ? 'border border-danger' : ''}}" id="phone" placeholder="Phone" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Department</label>
                <select name="department" class="form-control" id="exampleFormControlSelect1">
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
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