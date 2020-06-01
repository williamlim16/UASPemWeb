@extends('layouts.app')

@section('content')

<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <a href="/home">Back to home</a>
            </div>
            <div class="row">
                <h3>Ticket Purchase History</h3>
            </div>

            @foreach($data as $ticket)
            <div class="row ml-10 mt-3" style="display:inline-block">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 mr-0" style="overflow:hidden">
                            <img src="/{{$ticket->posterpath}}" alt="Card image cap" style="height:160px;width:300px">
                        </div>
                        <div class="col-md-8 border-left border-danger ml-0" style="border-left-width: 10px !important">
                            <p>Purchase Date : {{$ticket->created_at}}</p>
                            <p style="  font-weight: bold;">{{$ticket->title}}</p>
                            <p>Screening Time : {{$ticket->date}} @ {{rtrim($ticket->time, "0")}}</p>
                            <p>Seat : {{$ticket->seat}} @ Auditorium {{($ticket->audit)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</body>
@endsection