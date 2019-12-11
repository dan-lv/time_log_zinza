@extends('layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="container modify">
        <form class="form-absent container" method="POST" action="{{ route('ad-absents.update', $absent->id) }}" >
            @csrf
            @method('PUT')
            @include('message_validation')
            <h2 class="d-flex justify-content-center"> Fill the following form </h2>
            <div class="form-group">
                <label for="time-absent-from">Absent from:</label>
                <input type="text" name="absent-from" class="form-control timepicker" id="time-absent-from" value="{{ $absent->time_absent_from }}">
            </div>

            <div class="form-group">
                <label for="time-absent-to">Absent to:</label>
                <input type="text" name="absent-to" class="form-control timepicker" id="time-absent-to" value="{{ $absent->time_absent_to }}">
            </div>
            
            <div class="form-group">
                <label for="day-absent">Day Absent:</label>
                <input id="day-absent" class="form-control" type="text" name="day" value="{{ $absent->day }}">
            </div>

            <div class="form-group">
                <label for="reason">Reason:</label>
                <input id="reason" name="reason" class="form-control" type="text" value="{{ $absent->reason }}">
            </div>

            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-secondary"> Save </button>
                <button type="reset" class="btn btn-secondary"> Cancel </button>
            </div>     
        </form>
    </div>
</div>
@endsection
