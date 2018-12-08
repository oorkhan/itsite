<?php
    use App\Http\Controllers\ProjectController;
?>
@extends('layout')
@section('title', 'Projects')
@section('content')
<div class="container-fluid">
 <h1>Create project</h1>
    <div class="row">
        <div class="col-8">
            <form method="POST" action="/projects">
                    @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input required placeholder="Project title" required value="{{old('title')}}" name="title" class="form-control {{$errors->has('title') ? 'border border-danger' : ''}}" id="title" type="text" >
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea required required name="description" class="form-control {{$errors->has('description') ? 'border border-danger' : ''}}" id="description" >{{old('description')}}</textarea>
                </div>                
                <button type="submit" class="btn btn-warning mb-2">Create</button>
            </form>
        </div>
        @include('error')
    </div>
</div>
@endsection