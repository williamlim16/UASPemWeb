@extends('layouts.adminapp')


@section('content')
    <div class="container">
        <img src="/{{$movie->posterpath}}">
        <form action="/admin/movie/edit/poster/{{$movie->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <input type="file" name="poster" class="mt-2">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
        </form>
        <div class="row">
            <a href="/admin/movie" class="btn btn-danger mt-2">Cancel</a>
        </div>
    </div>

@endsection
