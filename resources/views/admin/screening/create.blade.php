@extends('layouts.adminapp')

@section('content')
<div class="container">
    <form action="/admin/screening/store" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="movie">Movie to be shown :</label>
            <input type="text" class="form-control" id="movie" name="movie" >
        </div>
        {{-- <div class="form-group row">
            <div class="col-5">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" readonly>
            </div>
            <div class="col-5">
                <label for="age">Age rating</label>
                <input type="text" class="form-control" id="age" name="age" readonly>
            </div>
        </div> --}}
        <div class="form-group">
            <label for="auditorium">Pick an Auditorium :</label>
            <input type="text" class="form-control" id="auditorium" name="auditorium" >
        </div>
        <div class="form-group">
            <label for="date">Date of screening :</label>
            <textarea type="date" class="form-control" id="date" name="date"></textarea>
        </div>
        <div class="form-group">
            <label for="time">Time :</label>
            <input type="time" class="form-control" id="time" name="time" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection