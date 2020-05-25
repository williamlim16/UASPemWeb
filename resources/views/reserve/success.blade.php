@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <p>Reservation for Screening id : {{$screeningid}} is successful !</p> 
        <br>
    </div>
    <div class="row justify-content-md-center">
        <a href="/home">Back to home</a>
        
    </div>
</div>
@endsection