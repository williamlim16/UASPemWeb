@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail</h1>
    <p>Title : {{$movie->title}} </p>
    <p>Director : {{$movie->director}} </p>
    <p>Sypnosis : {{$movie->sypnosis}} </p>
</div>

@endsection