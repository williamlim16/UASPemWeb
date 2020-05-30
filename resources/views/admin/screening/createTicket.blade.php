@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-9">
            <form id="screeningForm">
                <div class="form-group">
                    <label for="screeningPick">Pick a screening :</label>
                        <select id="screeningPick" name="screeningPick" class="custom-select">
                            @foreach($screenings as $s)
                                <option value='{{$s->sId.",".$s->aId}}' @if($loop->index == 0){{"selected"}}@endif>{{"[".$s->sId."] Showing: ".$s->title." @ ".$s->date.", ".$s->time.". Auditorium: ". $s->aName}}</option>
                            @endforeach
                        </select>
                    <div class="row justify-content-md-center mt-2">
                        <button class="btn btn-primary" id="ajaxSubmit">Check for available seats</button>
                    </div>
                </div>
            </form>
            
            <form action="/admin/screening/ticket/store" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" id="screening_id" name="screening_id" value="" hidden required>
                    <label for="seat_id">Available Seats<label>
                    <select id="seat_id" name="seat_id" class="custom-select ml-1 dis" disabled required>

                    </select>
                </div>
                
                <div class="form-group">
                    <label for="user_id">On behalf of ? <label>
                    <select id="user_id" name="user_id" class="custom-select">
                        @foreach($users as $u)
                            <option value='{{$u->id}}' @if($loop->index == 0){{"selected"}}@endif>{{"[".$u->id."] ".$u->name." | ".$u->email}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary dis" disabled>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
<script>
    function a(){
        var pick = document.getElementById('screeningPick');
        var screenId = document.getElementById('screening_id');
        pick.addEventListener('input', function() {
                screenId.value = this.value.substr(0, this.value.indexOf(','));
        });
    }
    jQuery(document).ready(function(){
            jQuery('#screeningForm').submit(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                jQuery.ajax({
                    url: "{{ route('admin.checkseat') }}",
                    method: 'POST',
                    data: {
                        id: jQuery('#screeningPick').val(),
                    },
                    success: function(result){
                        console.log(result.data);
                        $('#seat_id').empty();
                        for (var i = 0; i < result.data.length; i++) {
                            $('#seat_id').append('<option value="' + result.data[i].id + '">' + result.data[i].row + result.data[i].number + '</option>');
                        }
                        if(result.data.length > 0)$('.dis').prop("disabled", false);
                        else $('.dis').prop("disabled", true);
                        var a = jQuery('#screeningPick').val();
                        jQuery('#screening_id').val(a.substr(0, a.indexOf(',')));
                        // $('#screening_id').prop("hidden", false);
                    }});
                });
                
                return false;
            });


</script>
@endpush
