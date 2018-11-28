@extends('layout')
@section('title', 'Add department')
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
<p>Add departments of your organization to database.</p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/departments">
        {{csrf_field()}}
            <div class="form-group">
                <label for="departmentNameInput">Department name</label>
                <input required value="{{old('departmentName')}}" name="departmentName" class="form-control {{$errors->has('departmentName') ? 'border border-danger' : ''}}" id="departmentNameInput" type="text" >
                
            </div>
            <div class="form-group">
                <label for="departmentDescription">Describe department </label>
                <textarea required name="departmentDescription" class="form-control {{$errors->has('departmentDescription') ? 'border border-danger' : ''}}" id="departmentDescription" cols="30" rows="10" >{{old('departmentDescription')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Save</button>
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
<a href="{{ URL::previous() }}">Go Back</a>
@endsection