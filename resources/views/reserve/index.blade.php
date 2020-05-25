@extends('layouts.app')

@section('content')

<body>
    <div id="app">
        <!-- {{ json_encode($seats)}} -->
        <example-component :seats="{{ json_encode($seats) }}" :screeningid="{{ $screeningid }}"></example-component>

    </div>
</body>
@endsection