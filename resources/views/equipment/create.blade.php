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
<form method="POST" action="{{route('equipment_type.store')}}" id="form">
@csrf
<div class="row"> 
 
    <div class="col-6">
        
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" placeholder="Model">
        </div>
        <div class="form-group">
            <label for="serial">Serial number</label>
            <input type="text" class="form-control" id="serial" placeholder="serial number">
        </div>
        <div class="form-group">
            <label for="invertoryNo">Inventory number</label>
            <input type="text" class="form-control" id="invertoryNo" placeholder="invertory number">
        </div>
        <div class="form-group">
                <label for="room">Room</label>
                <select name="room" class="form-control" id="room">
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="employee">Employee</label>
            <select name="employee" class="form-control" id="employee">
                @foreach($employees as $employee)
                <option value="{{$employee->id}}">dddd</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="1" class="form-control" id="price" placeholder="Purchace price">
        </div>
        <div class="form-group">
            <label for="date">Purchase date</label>
            <input type="date" class="form-control" id="date" placeholder="Purchace date">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status">
                <option value="good" selected>Good</option>
                <option value="bad">Bad</option>
            </select>
        </div>

       
        
    </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="type">Select type</label>
                <select id="type" class="form-control" onchange="onTypeChange()">
                <option selected>Choose...</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
                </select>
            </div>  
            <div id="features"></div>
            <button type="submit" class="btn btn-warning mb-2">Save</button>
        </div>
    </div>
</form>
</div>
 
    @include('error')
<!-- /.container-fluid -->
@endsection