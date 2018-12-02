@extends('layout')
@section('title', 'Edit task')
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
<p>Edit task data or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/tasks/{{$task->id}}">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" class="form-control" id="title" type="text" value="{{$task->title}}">
            </div>

            <div class="form-group">
                <label for="description">Describe task </label>
                <textarea required name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}"  cols="30" rows="10" >{{$task->description}}</textarea>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Employee</label>
                <select name="employee" class="form-control" id="exampleFormControlSelect1">
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}" class="{{$employee->id == $task->employee_id ? 'selected' : ''}}">{{$employee->name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value="1" {{$task->completed == 1 ? 'selected' : ''}}>Completed</option>
                    <option value="0" {{$task->completed == 0 ? 'selected' : ''}}>In progress</option>
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