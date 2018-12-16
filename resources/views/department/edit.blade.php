@extends('layout')
@section('title', 'Edit department')
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
<p>Edit department data or <a href="{{ route('departments.show', $department->id) }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{route('departments.update', $department->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Name</label>
                <input name="name" class="form-control" id="title" type="text" value="{{$department->name}}">
            </div>
            <div class="form-group">
                <label for="description">Describe department </label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$department->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="campus_id">Campus</label>
                <select name="campus_id" class="form-control" id="campus_id">
                    <option value="" selected>Choose campus</option>
                    @foreach($campuses as $campus)
                    <option {{$campus->id == $department->campus->id ? 'selected' : ''}} value="{{$campus->id}}">{{$campus->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning mb-2">Update</button>
        </form>
    </div>
</div>

<!-- /.container-fluid -->
@endsection
