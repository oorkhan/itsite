<?php
    $roomName = 'Room '.$room->name;
?>
@extends('layout')
@section('title', $roomName)
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            @include('/messages')
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Room: {{$room->name}}.
                </div>
                <div class="card-body">
                    <div class="col-8"> <!--Room details-->
                        <div>Campus: {{$room->campus->name}}</div>
                        <div>Room type: {{$room->type}}</div>
                        <div>Phone number: {{$room->phone}}</div>
                        <div>
                        <hr>
                            <p>Description: {{$room->description}}</p>
                        <hr>
                        </div>
                        <div>Room status: {{$room->status}}</div>
                        <div>Number of seats: {{$room->number_of_seats}}</div>
                    </div><!--end Room details-->
                    <div class="col-4"><!--buttons-->
                        <a href="{{ route('rooms.index') }}" class="btn btn-outline-dark">BACK</a>
                        <a href="{{ $room->id }}/edit" class="btn btn-warning">EDIT</a>
                        <a href="#" onclick="if(confirm('Are you sure?')){$('#deleteform').submit()}" class="btn btn-danger">DELETE</a>
                        <form id="deleteform" action="{{route('rooms.destroy', $room->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div><!--end buttons-->
                </div>
            </div>
        </div>
    </div> <!-- end row -->
        @if($room->employee->count())
<div class="row"><!--employee list row-->
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>{{$room->name}} employees list.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($room->employee as $emp)
                <tr>
                <td>{{$emp->id}}</td>
                <td><a href="{{route('employees.show', $emp->id)}}">{{$emp->name}}</a></td>
                <td><a href="{{route('employees.show', $emp->id)}}">{{$emp->surname}}</a></td>
                <td>{{$emp->phone}}</td>
                <td>{{$emp->email}}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div><!-- end employee list row-->
@endif
<h1> Equipment list below</h1>

</div><!-- /.container-fluid -->

@endsection
