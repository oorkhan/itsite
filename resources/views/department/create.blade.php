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
                <input name="departmentName" class="form-control" id="departmentNameInput" type="text" required>
                
            </div>
            <div class="form-group">
                <label for="departmentDescription">Describe department </label>
                <textarea name="departmentDescription" class="form-control" id="departmentDescription" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Save</button>
        </form>
    </div>
    @if($errors->any())
    <div class="col-md-6">
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