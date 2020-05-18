@extends('layouts.app')

@section('content')

<body>
    <!-- {{ json_encode($seats)}} -->
    <example-component :seats="{{ json_encode($seats) }}"></example-component>
</body>
@endsection