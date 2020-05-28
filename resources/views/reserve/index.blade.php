@extends('layouts.app')

@section('content')

<body>
    <div id="app">
        <!-- {{ json_encode($seats)}} -->
        <reserve-component :seats="{{ json_encode($seats) }}" :screeningid="{{ $screeningid }}"></reserve-component>

    </div>
</body>
@endsection