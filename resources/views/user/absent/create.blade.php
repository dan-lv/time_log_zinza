@extends('user.layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="container modify">
        <form class="form-absent container" method="POST" action="{{ route('absents.store') }}" >
            @csrf
            @include('message_validation')
            <h2 class="d-flex justify-content-center"> Fill the following form </h2>
            <div class="form-group">
                <label for="time-absent-from">Absent from:</label>
                <input type="text" name="absent-from" class="form-control timepicker" id="time-absent-from">
            </div>

            <div class="form-group">
                <label for="time-absent-to">Absent to:</label>
                <input type="text" name="absent-to" class="form-control timepicker" id="time-absent-to">
            </div>
            
            <div class="form-group">
                <label for="day-absent">Day Absent:</label>
                <input id="day-absent" class="form-control" type="text" name="day">
            </div>

            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea class="form-control" rows="3" id="reason" name="reason"></textarea>
            </div>

            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-secondary"> Send </button>
                <button type="reset" class="btn btn-secondary"> Cancel </button>
            </div>     
        </form>
    </div>
</div>
@endsection
