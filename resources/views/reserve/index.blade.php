@extends('layouts.app')

@section('content')

<body>
    <div id="app">
<<<<<<< Updated upstream
        <!-- {{ json_encode($seats)}} -->
        <example-component :seats="{{ json_encode($seats) }}" :screeningid="{{ $screeningid }}"></example-component>
=======
        <reserve-component :seats="{{ json_encode($seats) }}" :screeningid="{{ $screeningid }}"></reserve-component>
>>>>>>> Stashed changes

    </div>
</body>
@endsection
