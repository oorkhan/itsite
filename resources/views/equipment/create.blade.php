@extends('layout')
@section('title', 'Add equipment')
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
<p>Add equipment type to database or <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{route('equipment_type.store')}}">
        @csrf

            <button type="submit" class="btn btn-warning mb-2">Save</button>
        </form>
        </div>
    @include('error')
</div>

<!-- /.container-fluid -->
@endsection