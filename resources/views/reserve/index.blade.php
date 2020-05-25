@extends('layouts.app')

@section('content')

<body>

    <!-- {{ json_encode($seats)}} -->
    <example-component :seats="{{ json_encode($seats) }}" :screeningid="{{ $screeningid }}"></example-component>
</body>
@endsection