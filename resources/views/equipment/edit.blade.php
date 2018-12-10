@extends('layout')
@section('title', 'Edit equipment type')
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
<p>Edit equipment or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{route('equipment_type.edit')}}">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label for="name">Type name</label>
                <input placeholder="Computer, printer etc." required value="{{$equipmentType->name}}" name="name" class="form-control {{$errors->has('name') ? 'border border-danger' : ''}}" id="name" type="text" >
            </div>
            <button type="submit" class="btn btn-warning mb-2">Save</button>
        </form>
        </div>
    @include('error')
</div>

<!-- /.container-fluid -->
@endsection