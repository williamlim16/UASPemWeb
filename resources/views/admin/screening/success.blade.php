@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="alert alert-success">
            <p>Operation Successful</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <h3>Screening Details</h3>
    </div>
    <div class="row justify-content-md-center mb-2">
        <img src="/{{$movie->posterpath}}" alt="" class="img-thumbnail" style="width:200px; height:auto">
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <p>Movie Title</p>
        </div>
        <div class="col-md-6">
            <p>: {{$movie->title}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <p>Duration</p>
        </div>
        <div class="col-md-6">
            <p>: {{(int)($movie->time / 60)}}h {{$movie->time%60}}m</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <p>Auditorium Name</p>
        </div>
        <div class="col-md-6">
            <p>: {{$audi->name}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <p>Screening Date</p>
        </div>
        <div class="col-md-6">
            <p>: {{$latest->date}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <p>Screening Time</p>
        </div>
        <div class="col-md-6">
            <p>: {{$latest->time}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <a href="/admin/screening"><button class="btn btn-primary">Back to screening menu</button></a>
    </div>
</div>

@endsection