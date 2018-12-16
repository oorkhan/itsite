@extends('layout')
@section('title', 'Campuses')
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
    <p>Campuses of Western Caspian University.</p>
    <div>
    <a class="btn btn-success mb-2" href="{{route('campuses.create')}}">Add Campus</a>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>Campus list.
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Number of classrooms</th>
                    <th>Number of offices</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($campuses as $campus)
                <tr>
                    <td>{{$campus->id}}</td>
                    <td><a href="{{route('campuses.show', $campus->id)}}">{{$campus->name}}</a></td>
                    <td>{{$campus->description}}</td>
                    <td>{{$campus->address}} </td>
                    <td>coming soon</td>
                    <td>coming soon</td>
                    <td class="{{$campus->status == 1 ? "text-success" : ".text-danger"}}"><b>{{$campus->status == 1 ? "open" : "closed"}}</b></td>
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
