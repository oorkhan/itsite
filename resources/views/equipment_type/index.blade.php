<?php
use App\Http\Controllers\EquipmentTypeController;
$createUrl = action('EquipmentTypeController@create');
?>
@extends('layout')
@section('title', 'Equipment types')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <hr>
            <p>Computers, monitors, printers and so on.</p>
            <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i> List of equipment types. 
            <a href="{{route('equipment_type.create')}}" class="btn btn-success">Add type</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>Equipment type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($types as $type)
                <tr>
                    <td><a href="{{route('equipment_type.show', $type->id)}}">{{$type->name}}</a></td>
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