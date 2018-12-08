<?php
    use App\Http\Controllers\ProjectController;
?>
@extends('layout')
@section('title', 'Projects')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h1>{{$project->title}}</h1>
            <p>{{$project->description}}</p>
            <div>
                <a class="btn btn-warning mb-2" href="{{route('projects.edit', $project->id)}}">EDIT</a>
                <a class="btn btn-danger mb-2" href="#" onclick="$('#delete_form').submit()">DELETE</a>
                <form id="delete_form" action="/projects/{{$project->id}}" method="POST" style="display:inline">
                    @csrf 
                    @method('DELETE')
                </form>
            </div>
            @if($project->jobs->count())
            <div class="card mb-2">
                <div class="card-header">
                    <h4>Jobs</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($project->jobs as $job)
                        <li class="list-group-item">
                        <form action="/jobs/{{$job->id}}" method="POST" style="display:inline">
                        @csrf 
                        @method('PATCH')
                            <div class="form-check" style="display:inline">
                            <input name="completed" class="form-check-input" type="checkbox" value="" id="completed" onChange="this.form.submit()" {{$job->completed ? 'checked' : ''}}>
                            <label class="form-check-label" for="completed">
                                complete --
                            </label>
                            </div>
                        </form>
                        {{$job->description}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>  
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card mb-2">
                <div class="card-header">
                    <h3>Add Job</h3>
                </div>
                <div class="card-body">
                    <form action="/projects/{{$project->id}}/jobs" method="post">
                    @csrf

                        <div class="form-group has-error has-feedback">
                            <input class="form-control mb-2 {{$errors->has('description') ? 'border border-danger' : ''}}" type="text" name="description" placehoder="Job description" required value="{{old('description')}}">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
                @include('error')
            </div>
        </div>    
    </div>
</div>
@endsection