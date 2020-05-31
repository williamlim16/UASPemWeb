@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-9">
            <form action="{{ route('screening.update',['screening'=>$screening->id]) }}" method="post">
{{--                <form action="/screening/{{$screening->id}}" method="post">--}}
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="movie_id">Movie :</label>
                    {{-- <input type="text" class="form-control" id="movie_id" name="movie_id" > --}}
                    <select id="movie_id" name="movie_id" class="custom-select">
                        @foreach($movie as $m)
                            <option value='{{$m->id}}' @if($m->id == $screening->movie_id){{"selected"}}@endif>{{"[".$m->id."] ".$m->title." | ".$m->time."min | PG-".$m->age}}</option>
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
                    <label for="auditorium">Auditorium :</label>
                    {{-- <input type="text" class="form-control" id="auditorium_id" name="auditorium_id" > --}}
                    <select id="auditorium_id" name="auditorium_id" class="custom-select">
                        @foreach($audi as $a)
                            <option value='{{$a->id}}' @if($a->id == $screening->auditorium_id){{"selected"}}@endif>{{"[".$a->id."] ".$a->name." | ".$a->seats_no." seats"}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date of screening :</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$screening->date}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="time">Time :</label>
                    <input type="time" class="form-control" id="time" name="time" value="{{$screening->time}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
