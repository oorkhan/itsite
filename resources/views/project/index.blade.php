<?php
use App\Http\Controllers\ProjectController;
?>
@extends('layout')
@section('title', 'Projects')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Projects</h1>
            <ul>
                @foreach($projects as $project)
                <li>{{$project->title}}</li>
                @endforeach
            </ul>        

        </div>
    </div>
</div>
 

@endsection