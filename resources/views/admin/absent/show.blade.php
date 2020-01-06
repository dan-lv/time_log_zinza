@extends('layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="d-flex justify-content-center pt-2">
        <h3>Name of Staff: {{ $absent->user->name }}</h3>
    </div>
    <div class="container pt-3">
        <div class="form-absent container">
            <div class="form-group">
                <label for="time-absent-from">Absent from:</label>
                <input type="text" class="form-control timepicker" id="time-absent-from" value="{{ $absent->time_absent_from }}" readonly="">
            </div>

            <div class="form-group">
                <label for="time-absent-to">Absent to:</label>
                <input type="text" class="form-control timepicker" id="time-absent-to" value="{{ $absent->time_absent_to }}" readonly="">
            </div>
            
            <div class="form-group">
                <label for="day-absent">Day Absent:</label>
                <input id="day-absent" class="form-control" type="text" value="{{ $absent->day }}" readonly="">
            </div>

            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea class="form-control" rows="3" id="reason" name="reason" readonly="">{{ $absent->reason }}</textarea>
            </div>

            <div class="d-flex justify-content-around">
                <a class="btn btn-secondary" href="{{ route('manage.absents.create') }}" role="button"> Return </a>
            </div>
        </div>
    </div>
</div>
@endsection
