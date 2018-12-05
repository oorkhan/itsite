<?php
use App\Http\Controllers\RoomController;
$createUrl = action('RoomController@create');
?>
@extends('layout')
@section('title', 'Rooms')
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
    @include('/messages')
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quo a esse, minima tempora, magni quas obcaecati voluptate vero architecto ex maiores quaerat mollitia cum nostrum adipisci, harum perspiciatis assumenda.</p>
    <div>
    <a class="btn btn-success mb-2" href="{{$createUrl}}">Add Room</a>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>Room list.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Seats</th>
                    <th>Number of Employees</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Seats</th>
                    <th>Number of Employees</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td><a href="#">{{$room->id}}</a></td>
                    <td><a href="#">{{$room->name}}</a></td>
                    <td><a href="#">{{$room->description}}</a></td>
                    <td><a href="#">{{$room->department->name}}</a></td>
                    <td><a href="#">{{$room->type}}</a></td>
                    <td><a href="#">{{$room->number_of_seats}}</a></td>
                    <td><a href="#">{{$room->employee->count()}}</a></td> <!--count employees in the room-->
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>    
    </div>        
</div>
</div>
<!-- /.container-fluid -->
@endsection