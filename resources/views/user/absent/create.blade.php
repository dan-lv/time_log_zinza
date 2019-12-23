@extends('layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="container pt-3">
        <form class="form-absent container" method="POST" action="{{ route('absents.store') }}">
            @csrf
            @include('message_validation')
            <h2 class="d-flex justify-content-center"> Fill the following form </h2>
            <div class="form-group">
                <label for="time-absent-from">Absent from:</label>
                <input type="text" name="absent_from" class="form-control timepicker" id="time-absent-from" value="{{ old('absent_from') }}">
            </div>

            <div class="form-group">
                <label for="time-absent-to">Absent to:</label>
                <input type="text" name="absent_to" class="form-control timepicker" id="time-absent-to" value="{{ old('absent_to') }}">
            </div>
            
            <div class="form-group">
                <label for="day-absent">Day Absent:</label>
                <input id="day-absent" class="form-control" type="text" name="day" value="{{ old('day') }}">
            </div>

            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea class="form-control" rows="3" id="reason" name="reason">{{ old('reason') }}</textarea>
            </div>

            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-secondary"> Send </button>
                <a class="btn btn-secondary" href="/" role="button"> Cancel </a>
            </div>
        </form>
    </div>
</div>
@endsection
