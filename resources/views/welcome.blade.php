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
        <div class="search">
            <input type="text" name="search" id="myInput" maxlength= "30" placeholder="e.g. Interstellar" class="search-bar">
        </div>
    </div>
    {{-- Search --}}

    {{-- Filter --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2">
                <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Year
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <button class="dropdown-item">2020</button>
                        <button class="dropdown-item">2019</button>
                        <button class="dropdown-item">2015-2018</button>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Genre
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($movies as $movie)
                            @foreach ($movie->categories as $genre)
                    <button class="dropdown-item filter" value="{{ $genre }}">{{ $genre }}</button>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Age Rating
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <button class="dropdown-item">G</button>
                        <button class="dropdown-item">PG</button>
                        <button class="dropdown-item">PG-13</button>
                        <button class="dropdown-item">R</button>
                        <button class="dropdown-item">NC-17</button>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Duration
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <button class="dropdown-item filter" value="> 2 hours"> > 2 hours</button>
                        <button class="dropdown-item filter" value="< 2 hours"> < 2 hours</button>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Order By
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <button class="dropdown-item">Alphabetical</button>
                        <button class="dropdown-item">Latest</button>
                        <button class="dropdown-item">Oldest</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Filter --}}

    <div class="container mt-5" id="myDIV">
        <h3><strong>Now Showing</strong></h3>
        <div class="filter-result"></div>
        <div class="row">
        @foreach($movies as $movie)
        <a href="/movie/{{ $movie->id }}" id="{{ $movie->title }}">
            <div class="col-4 mt-4">
                    <div class="movie">
                        <div class="menu"><i class="material-icons"></i></div>
                        <div class="movie-img" style="background-image: url('{{ $movie->posterpath }}');"></div>
                            <div class="text-movie-cont">
                                <div class="mr-grid">
                                    <div class="col1">
                                    <h1>{{ $movie->title }}</h1>
                                    <ul class="movie-gen">
                                        <li>PG- {{ $movie->age }}  /</li>
                                        <li> {{ intval(($movie->time)/60) }}h{{ intval(($movie->time)%60) }}m /</li>
                                        {{-- <input type="text" id="duration" value="{{ intval(($movie->time)/60) >= 2 ? "> 2 hours" : "< 2 hours"}}"> --}}
                                        <p hidden>{{ intval(($movie->time)/60) >= 2 ? "> 2 hours" : "< 2 hours"}}</p>
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

    <script>
    $(document).ready(function(){
    // Search bar
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myDIV a").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

    // Dropdown Filter
        $('.filter').on('click', function () {
            $(".filter-result").html("");
            var filter_value = $(this).val();
            $(".filter-result").append('<div class="row"><div class="col-md-5"><h4 style="color: black">Showing results for : '
            + filter_value
            + '</h4></div><div class="col-md-2 container"><button class="btn btn-light rmv"><i class="fas fa-times"></i> Remove Filter</button></div></div>');
            $("#myDIV a").filter(function() {
                $(this).toggle($(this).text().indexOf(filter_value) > -1)
            });
        });

    //Remove Filter
        $(document).on('click', '.rmv', function(){ //for dynamically created button
            $(".filter-result").html("")
            $("#myInput").val("")
            $("#myDIV a").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf('') > -1)
            });
        });

    });
    </script>
</body>
@endsection
