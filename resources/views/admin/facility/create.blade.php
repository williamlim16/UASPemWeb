@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-8">
            <form action="/admin/facility/store" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Auditorium Name :</label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
                <div class="form-group">
                    <label for="seats_no">Seat Count :</label>
                    <input type="number" class="form-control" id="seats_no" name="seats_no" >
                </div>
                <div class="form-group">
                    <label for="row">Row Length :</label>
                    <input type="number" class="form-control" id="row" name="row" placeholder="Default: 10 (A1-A10, then B1-B10)">
                </div>
        
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
</div>

@endsection