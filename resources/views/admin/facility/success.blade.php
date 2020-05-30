@extends('layouts.adminapp')
<?php print_r($a);?>
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="alert alert-success">
            <p>Operation Successful</p>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <a href="/admin/facility"><button class="btn btn-primary">Back to Menu</button></a>
    </div>
</div>

@endsection