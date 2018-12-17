@extends('layout')
@section('title', 'Edit room')
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
<p>Edit room information or <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/rooms/{{$room->id}}">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input placeholder="name" required value="{{$room->name}}" name="name" class="form-control {{$errors->has('name') ? 'border border-danger' : ''}}" id="name" type="text" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea required name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}" id="description" >{{$room->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" value="{{$room->phone}}" required name="phone" class="form-control {{$errors->has('phone') ? 'border border-danger' : ''}}" id="phone" >
            </div>
             <div class="form-group">
                <label for="campus_id">Campus</label>
                <select name="campus_id" class="form-control" id="campus_id">
                    <option value="" selected>Choose campus</option>
                    @foreach($campuses as $campus)
                    <option {{$campus->id == $room->campus->id ? 'selected' : ''}} value="{{$campus->id}}">{{$campus->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="department_id">Department (Change with search-select box)</label>
                <select name="department_id" class="form-control" id="department_id">
                    <option selected>Select department</option>
                    @if($room->department)
                    @foreach($departments as $department)
                    <option value="{{$department->id}}" {{$department->id == $room->department->id ? 'selected' : ''}}>{{$department->name}}</option>
                    @endforeach
                    @else
                    @foreach($departments as $department)
                    <option value="{{$department->id}}"}}>{{$department->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="classroom" {{$room->type == 'classroom' ? 'selected' : ''}}>classroom</option>
                    <option value="office" {{$room->type == 'office' ? 'selected' : ''}}>office</option>
                </select>
            </div>
            <div class="form-group">
                <label for="number_of_seats">Number of seats</label>
                <input name="number_of_seats" class="form-control" type="number" value="{{$room->number_of_seats}}" id="number_of_seats">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status">
                    <option value="open" {{$room->status == 'open' ? 'selected' : ''}}>open</option>
                    <option value="closed" {{$room->status == 'closed' ? 'selected' : ''}}>closed</option>
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
