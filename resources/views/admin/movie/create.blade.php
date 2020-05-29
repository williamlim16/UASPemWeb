@extends('layouts.adminapp')

@section('content')
<div class="container">
    <form action="/admin/movie/store" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>
        <div class="form-group">
            <label for="director">Director :</label>
            <input type="text" class="form-control" id="director" name="director" >
        </div>
        <div class="form-group">
            <label for="synopsis">Synopsis :</label>
            <textarea type="text" class="form-control" id="synopsis" name="synopsis"></textarea>
        </div>
        <div class="form-group">
            <label for="time">Duration :</label>
            <input type="number" class="form-control" id="time" name="time" >
        </div>
        <div class="form-group">
            <label for="age">Age Rating:</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>
        <div class="form-group">
            <label for="categories">Categories (separates with commas):</label>
            <input type="text" class="form-control" id="categories" name="categories" placeholder="e.g. Funny,Romance,Adventure">
        </div>
        <div class="form-group">
            <label for="casts">Casts (separates with commas):</label>
            <input type="text" class="form-control" id="casts" name="casts" placeholder="e.g. Gordon Ramsay,Tom Hanks">
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="posterpath">Poster path </label>--}}
{{--            <input type="text" class="form-control" id="posterpath" name="posterpath" >--}}
{{--        </div>--}}
        <input type="file" name="poster">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
