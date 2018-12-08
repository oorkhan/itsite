<?php
use App\Http\Controllers\ProjectController;
?>
@extends('layout')
@section('title', 'Projects')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Projects <span><a class="btn btn-success" href="{{route('projects.create')}}">Add project</a><span></h1>
            <ul>
                @foreach($projects as $project)
                <li>               
                    <a class="btn btn-warning mb-2" href="{{route('projects.edit', $project->id)}}">EDIT</a> | 
                    <a href="{{route('projects.show', $project->id)}}">{{$project->title}}</a>
                    <form id="delete_form" action="/projects/{{$project->id}}" method="POST" style="display:inline">
                        @csrf 
                        @method('DELETE')
                    </form>
                </li>
                @endforeach
            </ul>        

        </div>
    </div>
</div>
 

@endsection