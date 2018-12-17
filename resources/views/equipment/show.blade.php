@extends('layout')
@section('title', 'Equipment')
@section('content')

<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
    </ol>
        <div class="row">
        <div class="col-md-12">
            @include('/messages')
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Equipment: {{$equipment->name}}.
                </div>
                <div class="card-body">
                    <div class="col-8"> <!--Room details-->
                        <div>Model: {{$equipment->model}}</div>
                        <div>Serial: {{$equipment->serial_no}}</div>
                        <div>Inventory number: {{$equipment->inventar_no}}</div>
                        <div>Room: {{$equipment->room->name}}</div>
                        <div>Price: {{$equipment->price}}</div>
                        <div>Date of purchase: {{$equipment->date_of_purchase}}</div>
                        <div>Status: {{$equipment->status}}</div>
                        <div>Employee: {{$equipment->employee->name}}</div>
                        <div>Type: {{$equipment->equipmentType->name}}</div>

                    </div><!--end Room details-->
                    <div class="col-4"><!--buttons-->
                        <a href="{{ route('equipments.index') }}" class="btn btn-outline-dark">BACK</a>
                        <a href="{{route('equipments.edit', $equipment->id)}}" class="btn btn-warning">EDIT</a>
                        <a href="#" onclick="if(confirm('Are you sure?')){$('#deleteform').submit()}" class="btn btn-danger">DELETE</a>
                        <form id="deleteform" action="{{route('equipments.destroy', $equipment->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div><!--end buttons-->
                </div>
            </div>
        </div>
    </div>
        <!-- Page Content -->

</div>
<!-- /.container-fluid -->
@endsection
