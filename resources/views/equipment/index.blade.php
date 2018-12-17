@extends('layout')
@section('title', 'Equipment')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('messages')
            <hr>
            <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i> List of equipment.
            <a href="{{route('equipments.create')}}" class="btn btn-success">Add Equipment</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>id</th>
                <th>Model</th>
                <th>Serial</th>
                <th>Inventar</th>
                <th>Room</th>
                <th>Status</th>
                <th>Employee</th>
                <th>Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipments as $equipment)
                <tr>
                    <td>{{$equipment->id}}</td>
                    <td><a href="{{route('equipments.show', $equipment->id)}}">{{$equipment->model}}</a></td>
                    <td>{{$equipment->serial_no}}</td>
                    <td>{{$equipment->inventar_no}}</td>
                    <td>{{$equipment->room->name}}</td>
                    <td>{{$equipment->status}}</td>
                    <td><a href="{{route('employees.show', $equipment->employee->id)}}">{{$equipment->employee->name}} {{$equipment->employee->surname}}</a></td>
                    <td>{{$equipment->equipmentType->name}}</td>
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
