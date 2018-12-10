@extends('layout')
@section('title', 'Equipment')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
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
                <th>Serial</th>
                <th>Inventar</th>
                <th>Room</th>
                <th>Status</th>
                <th>Model</th>
                <th>Employee</th>
                <th>Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipments as $equipment)
                <tr>
                    <td>{{$equipment->id}}</td>
                    <td><a href="#">{{$equipment->model}}</a></td>
                    <td>qqqqqqq</td>
                    <td>qqqqqqq</td>
                    <td>qqqqqqq</td>
                    <td>qqqqqqq</td>
                    <td>qqqqqqq</td>
                    <td>qqqqqqq</td>
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