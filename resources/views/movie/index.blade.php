@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sypnosis</th>
                        <th>Duration</th>
                        <th>Age</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($movies as $movie)
                    <tr>
                        <td>{{$movie->id}}</td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->sypnosis}}</td>
                        <td>{{$movie->duration_min}}</td>
                        <td>{{$movie->age}}</td>
                        <td>
                            <button class="btn btn-primary"><a href="{{ route('movie.show', $movie->id) }}" class="text-dark btn">Show</a></button>
                            <button class="btn btn-warning"><a href="{{ route('movie.edit', $movie->id) }}" class="text-dark btn">Edit</a></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sypnosis</th>
                        <th>Duration</th>
                        <th>Age</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>


@endsection