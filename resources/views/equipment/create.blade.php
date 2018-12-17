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
<p>Add equipment type to database or <a href="{{ route('equipments.index') }}" class="btn btn-outline-dark btn-sm">go back</a></p>
<form method="POST" action="{{route('equipments.store')}}" id="form">
@csrf
<div class="row">

    <div class="col-6">

        <div class="form-group">
            <label for="model">Model</label>
            <input name="model" value="{{old('model')}}" type="text" class="form-control {{$errors->has('model') ? 'border border-danger' : ''}}" id="model" placeholder="Model">
        </div>
        <div class="form-group">
            <label for="serial_no">Serial number</label>
            <input value="{{old('serial_no')}}" name="serial_no" type="text" class="form-control {{$errors->has('serial_no') ? 'border border-danger' : ''}}" id="serial_no" placeholder="serial number">
        </div>
        <div class="form-group">
            <label for="inventar_no">Inventory number</label>
            <input value="{{old('inventar_no')}}" name="inventar_no" type="text" class="form-control {{$errors->has('inventar_no') ? 'border border-danger' : ''}}" id="inventar_no" placeholder="invertory number">
        </div>
        <div class="form-group">
                <label for="room_id">Room</label>
                <select name="room_id" class="form-control" id="room_id">
                    <option selected>Select room</option>
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}" {{old('room_id')==$room->id ? 'selected' : ''}}>{{$room->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" id="employee_id">
                <option selected>Select employee</option>
                @foreach($employees as $employee)
                <option value="{{$employee->id}}" {{old('employee_id')==$employee->id ? 'selected' : ''}}>{{$employee->name}} {{$employee->surname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input value="{{old('price')}}" name="price" type="number" min="1" class="form-control {{$errors->has('price') ? 'border border-danger' : ''}}" id="price" placeholder="Purchace price">
        </div>
        <div class="form-group">
            <label for="date_of_purchase">Purchase date</label>
            <input value="{{old('date_of_purchase')}}" name="date_of_purchase" type="date" class="form-control {{$errors->has('date_of_purchase') ? 'border border-danger' : ''}}" id="date_of_purchase" placeholder="Purchace date">
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
                <label for="EquipmentType_id">Select type</label>
                <select name="EquipmentType_id" id="EquipmentType_id" class="form-control" onchange="onTypeChange()">
                <option selected>Choose...</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}" {{old('EquipmentType_id')==$type->id ? 'selected' : ''}}>{{$type->name}}</option>
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
