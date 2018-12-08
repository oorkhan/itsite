<?php
    use App\Http\Controllers\ProjectController;
?>
@extends('layout')
@section('title', 'Projects')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit project</h1>
            <form method="POST" action="/projects/{{$project->id}}">
                    @csrf
                    @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input required placeholder="Project title" required value="{{$project->title}}" name="title" class="form-control {{$errors->has('title') ? 'border border-danger' : ''}}" id="title" type="text" >
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea required required name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}" id="description" >{{$project->description}}</textarea>
                </div>                
                <button type="submit" class="btn btn-warning mb-2">UPDATE</button> <a class="btn btn-danger mb-2" href="#" onclick="$('#delete_form').submit()">DELETE</a>
            </form>
            <form id="delete_form" action="/projects/{{$project->id}}" method="POST" style="display:inline">
                @csrf 
                @method('DELETE')
            </form>
        </div>
    </div>
</div>
@endsection