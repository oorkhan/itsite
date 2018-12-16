@extends('layout')
@section('title', 'Edit: '.$campus->name)
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
<p>Edit campus information or <a href="{{ route('campuses.show', $campus->id) }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{route('campuses.update', $campus->id)}}">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input required placeholder="name" required value="{{$campus->name}}" name="name" class="form-control {{$errors->has('name') ? 'border border-danger' : ''}}" id="name" type="text" >
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input required placeholder="address" required value="{{$campus->address}}" name="address" class="form-control {{$errors->has('address') ? 'border border-danger' : ''}}" id="address" type="text" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea required name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}" id="description" >{{$campus->description}}</textarea>
            </div>
             <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status">
                <option {{$campus->status == 0 ? 'selected' : ''}} value="0">closed</option>
                <option {{$campus->status == 1 ? 'selected' : ''}} value="1">open</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning mb-2">Save</button>
        </form>
        </div>
   @include('error')
</div>

<!-- /.container-fluid -->
@endsection
