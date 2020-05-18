@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/details.css') }}" rel="stylesheet">
</head>

<div class="row movie_card" id="tomb">
    <div class="info_section">
        <div class="col-md-6 movie_header">
            <img class="thumbnail" src="{{ $movie->PosterLink}}"/>
            <h1>{{ $movie->title}} </h1>
            <h4>Director: {{ $movie->director}}</h4>
            <span class="minutes"> {{ $movie->duration_min}}</span>
            <p class="type">{{$movie->categories}}</p>
        </div>

        <div class="col-md-6 movie_desc">
            <p class="text">
            {{ $movie->sypnosis}}
            </p>
        </div>

        <div class="col-md-6 mt-5 cast">

            <div class="row">
                <div class="col-md-3">
                    <h4>Director</h4>
                    <div class="col-sm-3 mt-3">
                        <img src="/img/interstellar_cover.jpg" class="cast-icon">
                    <p>{{ $movie->director }}</p>
                    </div>
                </div>

                <div class="col-md-9">
                    <h4>Cast</h4>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                                <img src="/img/interstellar_cover.jpg" class="cast-icon">
                                <p>Christopher</p>
                        </div>
                        <div class="col-sm-3">
                                <img src="/img/inception_cover.jpg" class="cast-icon">
                                <p>Anna</p>
                        </div>
                        <div class="col-sm-3">
                                <img src="/img/captain_marvel_cover.jpg" class="cast-icon">
                                <p>Guy</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <h4>Pick your time</h4>
            <div class="row">
                <div class="col-sm-3">
                    <button class="btn btn-2">10:00</button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-2">12:00</button>

                </div>
                <div class="col-sm-3">
                    <button class="btn btn-2">13:00</button>

                </div>
                <div class="col-sm-3">
                    <button class="btn btn-2">14:00</button>
                </div>
            </div>
        </div>




        <form action="" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" name="delete-btn" id="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
    {{-- <div class="blur_back" style="background-image: url('{{ $movie->PosterLink}}')"></div> --}}
    <div class="blur_back" style="background-image: url('/img/inception_details.jpg')"></div>
</div>






@endsection
