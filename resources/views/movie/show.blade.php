@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/details.css') }}" rel="stylesheet">
</head>

<div class="row movie_card">
    <div class="info_section">
        <div class="col-md-6 movie_header">

            <img class="img-thumbnail" src="{{"/".$movie->posterpath}}"/>
            <h1>{{ $movie->title}} </h1>
            <h4>Director: {{ $movie->director}}</h4>
            <span class="minutes"> {{ $movie->duration_min}}</span>
            <p class="type">
                @foreach($movie->categories as $genre)
                    @if($loop->index == 0){{$genre}}
                    @else{{", ".$genre." "}}
                    @endif
                @endforeach
            </p>
        </div>

            <span class="minutes"> {{ $movie->time}}m</span>

            <p class="type">
                @foreach ($movie->categories as $category)
                {{ $loop->first ? '' : '/ ' }}
                {{$category}}
                @endforeach
            </p>
        </div>
        <div class="movie_desc">
            <p>
                {{ $movie->sypnosis}}
            </p>
        </div>

        <div class="col-md-6">
            <div class="row cast">
                <div class="col-md-2">
                    <h4>Director</h4>
                    <div class="mt-3">
                        <img src="/img/interstellar_cover.jpg" class="cast-icon">
                        <p>{{ $movie->director }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <h4>Cast</h4>
                    <div class="row mt-3">
                        @foreach ($movie->casts as $cast)
                        <div class="col-sm-6">
                            <img src="/img/interstellar_cover.jpg" class="cast-icon">
                        <p>{{ $cast }}</p>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-7"></div>
            </div>
        </div>

        <div class="mt-3">
            <h4>Watch Trailer</h4> <br>
                <iframe width="560" height="315"
                {{-- src="{{ $movie->youtubelink }}" --}}
                src="https://www.youtube.com/embed/fTRnWXXDcL4"
                frameborder="0" allow="accelerometer; autoplay;
                encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>

        <div class="col-md-6 mt-3">
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

        <a href="/home"><button class="btn btn-secondary">Go Back</button></a>
        <div class="row">
            <div class="col-md-2">
                <form action="" method="POST">
                @csrf
                <input type="submit" name="reserve-btn" id="submit" class="btn-lg btn-primary" value="Reserve">
                </form>
            </div>
            <div class="col-md-2">
                <form action="" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete-btn" id="submit" class="btn-lg btn-danger" value="Delete">
                </form>
            </div>
        </div>
    </div>
{{-- <div class="blur_back" style="background-image: url('{{ $movie->thumbnail }}')"></div> --}}
<div class="blur_back" style="background-image: url('/img/inception_details.jpg')"></div>

</div>
@endsection
