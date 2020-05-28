@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/img/IMG_1875.jpeg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/captainmarvel.jpg" alt="Second slide">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
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
                                <li> {{ date('H', strtotime($movie->duration_min)) }}h{{ date('i', strtotime($movie->duration_min)) }}m  /</li>
                                <li>
                                    @foreach ($movie->categories as $category)
                                    {{ $loop->first ? '' : ', ' }}
                                    {{$category}}
                                    @endforeach
                                </li>
                            </ul>
                            </div>
                        </div>
                        <div class="mr-grid">
                            <div class="col1">
                            <p class="movie-description">{{ $movie->sypnosis }}</p>
                            </div>
                        </div>

                        <div class="mr-grid actors-row">
                            <div class="col1">
                            <p class="movie-actors">
                                @foreach ($movie->casts as $cast)
                                {{ $loop->first ? '' : ', ' }}
                                {{$cast}}
                                @endforeach
                            </p>
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
