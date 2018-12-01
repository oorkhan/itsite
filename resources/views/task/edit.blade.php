@extends('layout')
@section('title', 'Edit employee')
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
<p>Edit employee data or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/employees/{{$employee->id}}">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <div class="form-group">
                <label for="employeeNameInput">Name</label>
                <input name="employeeNameInput" class="form-control" id="employeeNameInput" type="text" value="{{$employee->name}}">
            </div>
            <div class="form-group">
                <label for="employeeSurnameInput">Surname</label>
                <input name="employeeSurnameInput" class="form-control" id="employeeSurnameInput" type="text" value="{{$employee->surname}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" class="form-control" id="phone" type="text" value="{{$employee->phone}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" class="form-control" id="email" type="text" value="{{$employee->email}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Department</label>
                <select name="department" class="form-control" id="exampleFormControlSelect1">
                    @foreach($departments as $department)
                    <option value="{{$department->id}}" class="{{$department->id == $employee->department_id ? 'selected' : ''}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value="1" {{$employee->status == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$employee->status == 0 ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
                <button type="submit" class="btn btn-warning mb-2">Update</button>
            </div>            
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