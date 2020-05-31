@extends('layouts.adminapp')

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-md-center mb-4">
            <div class="col-sm-6">
              <div class="card bg-light">
                <div class="card-body">
                  <h3 class="card-title" >Manage Movie List</h3>
                  <p class="card-text">Create, Read, Update, and Delete movie entries</p>
                  <a href="{{route('movies.index')}}" class="btn btn-primary">Go ></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-light">
                  <div class="card-body">
                    <h3 class="card-title">Manage Screening and ticket</h3>
                    <p class="card-text">Manage what show is currently running and its ticket list </p>
                    <a href="/admin/screening" class="btn btn-primary">Go ></a>
                  </div>
                </div>
              </div>
            </div>
        <div class="row justify-content-md-center mb-4">
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h3 class="card-title">Manage Facility</h3>
                        <p class="card-text">Manage auditoriums and other facility</p>
                        <a href="{{route('auditorium.index')}}" class="btn btn-primary">Go ></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card border-dark">
                    <div class="card-body">
                        <h3 class="card-title">View Sales Statistic</h3>
                        <p class="card-text">View statistic of ticket sale</p>
                        <a href="/admin/statistics" class="btn btn-primary">Go ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
