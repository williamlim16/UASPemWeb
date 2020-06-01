@extends('layouts.adminapp')


@section('content')
    <div class="container">
        <img src="/{{$user->profilepath}}" style="width: 100px; height: 100px">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="file" name="profile" class="mt-2">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
        </form>
        <div class="row">
            <a href="{{route('home')}}" class="btn btn-danger mt-2">Cancel</a>
        </div>
    </div>

@endsection
