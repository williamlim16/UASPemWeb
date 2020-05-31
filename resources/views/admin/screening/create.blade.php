@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-9">
            <form action="{{route('screening.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="movie_id">Movie to be shown :</label>
                    {{-- <input type="text" class="form-control" id="movie_id" name="movie_id" > --}}
                    <select id="movie_id" name="movie_id" class="custom-select">
                        @foreach($movie as $m)
                            <option value='{{$m->id}}' @if($loop->index == 0){{"selected"}}@endif>{{"[".$m->id."] ".$m->title." | ".$m->time."min | PG-".$m->age}}</option>
                        @endforeach
                    </select>
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
                    {{-- <input type="text" class="form-control" id="auditorium_id" name="auditorium_id" > --}}
                    <select id="auditorium_id" name="auditorium_id" class="custom-select">
                        @foreach($audi as $a)
                            <option value='{{$a->id}}' @if($loop->index == 0){{"selected"}}@endif>{{"[".$a->id."] ".$a->name." | ".$a->seats_no." seats"}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date of screening :</label>
                    <input type="date" class="form-control" id="date" name="date"></textarea>
                </div>
                <div class="form-group">
                    <label for="time">Time :</label>
                    <input type="time" class="form-control" id="time" name="time" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
