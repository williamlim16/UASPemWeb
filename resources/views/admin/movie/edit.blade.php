@extends('layouts.adminapp')


@section('content')
    <div class="container">
        <form action="{{route('movies.update',['movie'=>$movie->id])}}" method="POST">
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
                <select class="form-control form-control-md" id="age" name="age">
                    <option value="G">General Audiences (G)</option>
                    <option value="PG">Parental Guidance Suggested (PG)</option>
                    <option value="PG-13">Parents Strongly Cautioned (PG-13)</option>
                    <option value="R">Restricted (R)</option>
                    <option value="NC-17">Adults Only (NC-17)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categories">Categories (separates with commas):</label>
                <input type="text" class="form-control" id="categories" name="categories"
                       value="{{$movie->categories}}">
            </div>
            <div class="form-group">
                <label for="casts">Casts (separates with commas):</label>
                <input type="text" class="form-control" id="casts" name="casts" value="{{$movie->casts}}">
            </div>
            <div class="form-group">
                <label for="posterpath">Poster Path </label>
                <input type="text" class="form-control" id="posterpath" name="posterpath"
                       value="{{$movie->posterpath}}">
            </div>
            <div class="form-group">
                <label for="trailer">Trailer Embed Link</label>
                <input type="text" class="form-control" id="trailer" name="trailer"
                       value="{{$movie->trailer}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{ route('poster',['id'=> $movie->id]) }}" class="btn btn-warning mt-2">Change poster</a>
    </div>

@endsection
