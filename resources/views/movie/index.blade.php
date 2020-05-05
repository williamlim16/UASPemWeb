@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Sypnosis</th>
                            <th>Duration</th>
                            <th>Age</th>
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
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection