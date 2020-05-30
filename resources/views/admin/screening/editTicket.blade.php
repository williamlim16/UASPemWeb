@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-9">
            <div class="alert alert-info">
                <p>You may only change user_id of the ticket reservation. If you want to change other field, consider creating a new record.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-9">
            <form action="/admin/screening/ticket/update/{{$curr->screening_id}}/{{$curr->seat_id}}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="screening">Screening :</label>
                    <input type="text" value="{{"[".$curr->screening_id."] Showing: ".$movie->title." @ ".$screening->date.", ".$screening->time.". Auditorium: ".$audi->name}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="seat_id">Seat :<label>
                    <input type="text" value="{{ $seat->row." ".$seat->number}}" class="form-control ml-2" readonly>

                </div>
                
                <div class="form-group">
                    <label for="user_id">On behalf of ? <label>
                    <select id="user_id" name="user_id" class="custom-select">
                        @foreach($users as $u)
                            <option value='{{$u->id}}' @if($u->id == $curr->user_id){{"selected"}}@endif>{{"[".$u->id."] ".$u->name." | ".$u->email}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary dis">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection