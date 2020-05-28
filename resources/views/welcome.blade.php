@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">

    <div id="carousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            @foreach($movies as $movie)
            @if($loop->index==0)<div class="carousel-item active">
            @else<div class="carousel-item">
            @endif
                <img src="{{$movie->posterpath}}" alt="{{Str::substr($movie->posterpath, 4)}}" class="d-block w-100">
            </div>
            @endforeach
            {{-- <div class="carousel-item active">
                <img class="d-block w-100" src="/img/IMG_1875.jpeg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/captainmarvel.jpg" alt="Second slide">
            </div> --}}

        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>

    {{-- Search --}}
    <div class="container mt-5">
        <h3><strong>Looking for something to watch?</strong></h3>
        <div class="row search">
            <div class="col-md-9">
                <input type="text" name="search" id="search" maxlength= "30" placeholder="e.g. Interstellar" class="search-bar">
            </div>
            <div class="col-md-3">
                {{-- not finished --}}
            <form action="" method="POST">
                    <button class="btn-lg btn-secondary search-button">Search</button>
                </form>
            </div>
        </div>

    </div>
    {{-- Search --}}

    <div class="container mt-5">
        <h3><strong>Now Showing</strong></h3>
        <div class="row">
        @foreach($movies as $movie)
        <a href="/movie/{{ $movie->id }}">
            <div class="col-4">
                    <div class="movie">
                        <div class="menu"><i class="material-icons"></i></div>
                        <div class="movie-img" style="background-image: url('{{ $movie->posterpath }}');"></div>
                            <div class="text-movie-cont">
                                <div class="mr-grid">
                                    <div class="col1">
                                    <h1>{{ $movie->title }}</h1>
                                    <ul class="movie-gen">
                                        <li>PG- {{ $movie->age }}  /</li>
                                        <li> {{ intval(($movie->time)/60) }}h{{ intval(($movie->time)%60) }}m  /</li>
                                        <li>
                                            @foreach($movie->categories as $genre)
                                                @if($loop->index == 0){{$genre}}
                                                @else{{", ".$genre." "}}
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                    </div>

                                </div>
                            </div>
                        <div class="mr-grid">
                            <div class="col1">
                            <p class="movie-description">{{ $movie->sypnosis }}</p>
                            </div>
                        <div>
                            <div class="mr-grid actors-row ml-4">
                                <div class="col1">
                                <p class="movie-actors"> 
                                    @foreach($movie->casts as $actor)
                                        @if($loop->index == 0){{$actor}}
                                        @else{{", ".$actor}}
                                        @endif
                                    @endforeach
                                </p>
                                </div>
                            </div>
                            <div class="mr-grid actors-row ml-3" style="color:white">
                                {{$movie->synopsis}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        </div>
    </div>
</body>
@endsection
