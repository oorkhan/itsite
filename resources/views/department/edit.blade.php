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
<p>Edit department data or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/departments/{{$department->id}}">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <div class="form-group">
                <label for="title">Name</label>
                <input name="name" class="form-control" id="title" type="text" value="{{$department->name}}">
            </div>
            <div class="form-group">
                <label for="description">Describe department </label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$department->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-warning mb-2">Update</button>
        </form>
    </div>
</div>

<!-- /.container-fluid -->
<a href="{{ URL::previous() }}" class="btn btn-primary">Go Back</a>
@endsection