@extends('layouts.app')

@section('content')
<div>
    <h1>Detail</h1>
    <p>Title : {{$movie->title}}</p>
    <p>director : {{$movie->director}}</p>
    <p>sypnosis : {{$movie->sypnosis}}</p>
    <p>duration_min : {{$movie->duration_min}}</p>
    <p>age : {{$movie->age}}</p>

</div>
<form action="" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" name="delete-btn" id="submit" class="btn btn-danger" value="Delete">
</form>

@endsection
