@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="alert alert-success pb-0">
            <p>Reservation for seat(s) {{$seats}} by username : {{$name}} is successful !</p> 
        </div>
    </div>
    <div class="row justify-content-md-center">
        <h3>Screening Details</h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="offset-md-3 col-md-3">
            <p>Auditorium Name </p>
        </div>
        <div class="col-md-5">
            <p>: {{$data->name}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="offset-md-3 col-md-3">
            <p>Movie Title </p>
        </div>
        <div class="col-md-5">
            <p>: {{$data->title}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="offset-md-3 col-md-3">
            <p>Recommended Age </p>
        </div>
        <div class="col-md-5">
            <p>: {{$data->age}}</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="offset-md-3 col-md-3">
            <p>Movie Duration (minutes) </p>
        </div>
        <div class="col-md-5">
            <p>: {{$data->time}}m</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <img src="/{{$data->posterpath}}" alt="Movie poster" class="img-thumbnail">
    </div>
    <div class="row justify-content-md-center mt-4">
        <a href="/home">
            <button class="btn btn-primary"> Back to home</button>
        </a>
        
    </div>
</div>
@endsection