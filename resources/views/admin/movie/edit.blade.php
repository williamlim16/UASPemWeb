@extends('layouts.adminapp')


@section('content')
<div class="container">
    <form action="/movie/{{$movie->id}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$movie->title}}">
        </div>
        <div class="form-group">
            <label for="director">Director :</label>
            <input type="text" class="form-control" id="director" name="director" value="{{$movie->director}}">
        </div>
        <div class="form-group">
            <label for="synopsis">Synopsis :</label>
            <textarea type="text" class="form-control" id="synopsis" name="synopsis">{{$movie->synopsis}}</textarea>
        </div>
        <div class="form-group">
            <label for="time">Duration :</label>
            <input type="number" class="form-control" id="time" name="time" value="{{$movie->time}}">
        </div>
        <div class="form-group">
            <label for="age">Age Rating:</label>
            <input type="number" class="form-control" id="age" name="age" value="{{$movie->age}}">
        </div>
        <div class="form-group">
            <label for="categories">Categories (separates with commas):</label>
            <input type="text" class="form-control" id="categories" name="categories" value="{{$movie->categories}}">
        </div>
        <div class="form-group">
            <label for="casts">Casts (separates with commas):</label>
            <input type="text" class="form-control" id="casts" name="casts" value="{{$movie->casts}}">
        </div>
        <div class="form-group">
            <label for="posterpath">Poster path </label>
            <input type="text" class="form-control" id="posterpath" name="posterpath" value="{{$movie->posterpath}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="/admin/movie/edit/poster/{{$movie->id}}" class="btn btn-warning mt-2">Change poster</a>
</div>

@endsection
