@extends('layouts.app')

@section('content')

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

    <div class="container mt-5">
        <h3><strong>Now Showing</strong></h3>

        <div class="row">
            @foreach($movies as $movie)
        <a href="/movie/{{ $movie->id }}">
            <div class="col-4">
                    <div class="movie">
                        <div class="menu"><i class="material-icons"></i></div>
                    <div class="movie-img" style="background-image: url('{{ $movie->PosterLink }}');"></div>
                        <div class="text-movie-cont">
                            <div class="mr-grid">
                                <div class="col1">
                                <h1>{{ $movie->title }}</h1>
                                <ul class="movie-gen">
                                    <li>PG- {{ $movie->age }}  /</li>
                                    <li> {{ date('H', strtotime($movie->duration_min)) }}h{{ date('i', strtotime($movie->duration_min)) }}m  /</li>
                                    <li>Adventure, Drama, Sci-Fi,</li>
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
                                <p class="movie-actors">Matthew McConaughey, Anne Hathaway, Jessica Chastain</p>
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
