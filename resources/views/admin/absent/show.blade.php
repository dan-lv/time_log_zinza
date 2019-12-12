@extends('layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="d-flex justify-content-center">
        <h3>Name of Staff: {{ $absent->user->name }}</h3>
    </div>
    <div class="container modify">
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
        </div>
    </div>
</div>
@endsection
