@extends('layout')
@section('title', $campus->name)
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Campus: {{$campus->name}}.
                </div>
                <div class="card-body">
                    <div class="col-8">
                        @include('/messages') <!--Room details-->
                        <div>Status: <span class="{{$campus->status == 1 ? "text-success" : "text-danger"}}"><b>{{$campus->status == 1 ? "open" : "closed"}}</b></span></div>
                        <div>Address: {{$campus->address}}</div>
                        <hr>
                        <div>
                            <p>{{$campus->description}}</p>
                        </div>
                        <hr>
                        <div>List of rooms</div>
                        <div>List of departments</div>
                    </div><!--end Room details-->
                    <div class="col-4"><!--buttons-->
                        <a href="{{ route('campuses.index') }}" class="btn btn-outline-dark">BACK</a>
                        <a href="{{route('campuses.edit', $campus->id)}}" class="btn btn-warning">EDIT</a>
                        <a href="#" onclick="if(confirm('Are you sure?')){$('#deleteform').submit()}" class="btn btn-danger">DELETE</a>
                        <form id="deleteform" action="{{route('campuses.destroy', $campus->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div><!--end buttons-->
                </div>
            </div>
        </div>
    </div> <!-- end row -->
</div><!-- /.container-fluid -->

@endsection
