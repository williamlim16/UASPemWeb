@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/movie/{{$movie->id}}" method="post">
        @csrf
        @method('PATCH');
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$movie->title}}">
        </div>
        <div class="form-group">
            <label for="director">Director :</label>
            <input type="text" class="form-control" id="director" name="director" value="{{$movie->director}}">
        </div>
        <div class="form-group">
            <label for="sypnosis">Sypnosis :</label>
            <textarea type="text" class="form-control" id="sypnosis" name="sypnosis">{{$movie->sypnosis}}</textarea>
        </div>
        <div class="form-group">
            <label for="duration">Duration :</label>
            <input type="number" class="form-control" id="duration" name="duration_min" value="{{$movie->duration_min}}">
        </div>
        <div class="form-group">
            <label for="age">Age :</label>
            <input type="number" class="form-control" id="age" name="age" value="{{$movie->age}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection