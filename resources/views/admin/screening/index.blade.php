<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Bioscoop</title>

    <!-- Scripts --> 
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/childrow.css') }}" rel="stylesheet">
    <link rel = "icon" href ="/img/film-roll.png"type = "image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


</head>

<body id="bg_img">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                   <img src="/img/film-roll.png" alt="logo" style="width: 30px"> Bioscoop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" style="color:white">
                        <li><a href="/admin" style="color:white">Administrative Tools</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::id()==1)
                                <a class="dropdown-item" href="/admin"> Administrative tools</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row ml-1 mb-3">
                    <a href="/admin" style="float:left"><button class="btn btn-primary">< Back to Dashboard</button></a>
                </div>
                <h1 style="color:black; float:left">Screening List</h1>
                <a href="screening/create" style="float:right"><button class="btn btn-info">New Screening</button></a>
                <table id="screeningTable" class="table table-bordered data-table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            
                            {{-- <th>Movie Id</th> --}}
                            <th>Movie Title</th>
                            {{-- <th>Poster path</th> --}}
                            <th>Duration</th>
                            {{-- <th>Age</th> --}}
                            {{-- <th>Categories</th> --}}
                            {{-- <th>Auditorium Id</th> --}}
                            <th>Auditorium Name</th>
                            <th>Seats number</th>
                            
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <hr>
            
            {{-- ticket bellow --}}
            <div class="container mt-5">
                <h1 style="color:black; float:left">Ticket Reservations</h1>
                <a href="/admin/screening/ticket/create" style="float:right"><button class="btn btn-info">Add Ticket Reservation</button></a>
                <table id="ticketTable" class="table table-bordered data-table" >
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th width="100px">Screening ID</th>
                            <th>Seat</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6>
              <p class="text-justify">
                  yeet
              </p>
            </div>
  
            <div class="col-xs-6 col-md-3">
              
            </div>
            <div class="col-xs-6 col-md-3">
              <h6>Members:</h6>
              <ul class="footer-links">
                <li><a href="/home">Alfeto</a></li>
                <li><a href="/home">William</a></li>
                <li><a href="/home">Michael</a></li>
                <li><a href="/home">Ryukin Aranta Lika</a></li>
              </ul>
            </div>
  
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by Bioscoop.
              </p>
            </div>
          </div>
        </div>
    </footer>
     
    <script type="text/javascript" defer>
        console.log('help');
        $(function () {
            var table = $('#screeningTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.screening') }}",
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {data: 'sId', name: 'sId'},
                    {data: 'sDate', name: 'sDate'},
                    {data: 'sTime', name: 'sTime'},

                    //   {data: 'mId', name: 'mId'},
                    {data: 'title', name: 'title'},
                    //   {data: 'posterpath', name: 'posterpath'},
                    {data: 'duration', name: 'duration'},
                    //   {data: 'age', name: 'age'},
                    //   {data: 'categories', name: 'categories'},
                    
                    //   {data: 'aId', name: 'aId'},
                    {data: 'aName', name: 'aName'},
                    {data: 'seats', name: 'seats'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
              ],
              "order": [[ 1, "asc" ]]

            });
            var ticket = $('#ticketTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.ticket') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false},
                    {data: 'screeningId', name:'screeningId'},
                    {data: 'seat', name: 'seat'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                "order": [[ 1, "asc" ]]
            });

            $('#screeningTable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });
            function format ( d ) {
                console.log(d);
                // `d` is the original data object for the row
                return '<table class="table">'+
                    '<tr class="table-secondary">'+
                        '<td style="width:30%">Movie ID - Title:</td>'+
                        '<td style="width:69%">'+ d.mId + ' - ' + d.title + '</td>'+
                        '</tr>'+
                    '<tr class="table-secondary">'+
                        '<td>Thumbnail :</td>'+
                        '<td> <img src="/' +d.posterpath+'" style="width:50px;height:50px;"> </td>'+
                        '</tr>'+
                    '<tr class="table-secondary">'+
                        '<td>[Age Rating] and Cateogories:</td>'+
                        '<td>PG-['+ d.age + '], '+ d.categories + '</td>'+
                        '</tr>'+
                    '<tr class="table-secondary">'+
                        '<td>Auditorium ID - Name: </td>'+
                        '<td>'+ d.aId + ' - ' + d.aName + '</td>'+
                        '</tr>'+
                    '<tr class="table-secondary">'+
                        '<td>Auditorium booked seat(s): </td>'+
                        '<td>'+ (d.booked==null?0:d.booked.count)+ '</td>'+
                        '</tr>'+
                    '<tr class="table-secondary">'+
                        '<td>Available seat(s): </td>'+
                        '<td>'+ (d.seats - (d.booked==null?0:d.booked.count)) + '/' + d.seats+ '</td>'+
                        '</tr>'+
                    '</table>'
            }
        });
    </script>
</body>

</html>


