@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('profile.update',['id'=>$data->id])}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Nama :</label>
                <input type="text" class="form-control" id="title" name="name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="director">Email :</label>
                <input type="text" class="form-control" id="director" name="email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <label for="synopsis">Birthdate :</label>
                <input type="date" class="form-control" id="director" name="birthdate" value="{{$data->birthdate}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{route('profile.pict',['id'=>$data->id])}}" class="btn btn-warning mt-2">Edit profile</a>
        <a href="{{route('home')}}" class="btn btn-danger mt-2">Cancel</a>
    </div>

@endsection
