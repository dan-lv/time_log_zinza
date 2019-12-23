@extends('layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="container pt-3">
        @if (!$absent->exists)
        <form class="form-absent container" method="POST" action="{{ route('manage.absents.store') }}">
        @else
        <form class="form-absent container" method="POST" action="{{ route('manage.absents.update', $absent->id) }}">
        @method('PUT')
        @endif
            @csrf
            @include('message_validation')
            <h2 class="d-flex justify-content-center"> Fill the following form </h2>
            <div class="form-group">
                <label for="time-absent-from">Absent from:</label>
                <input type="text" name="absent_from" class="form-control timepicker" id="time-absent-from" value="{{ old('absent_from', $absent->time_absent_from) }}">
            </div>

            <div class="form-group">
                <label for="time-absent-to">Absent to:</label>
                <input type="text" name="absent_to" class="form-control timepicker" id="time-absent-to" value="{{ old('absent_to', $absent->time_absent_to) }}">
            </div>
            
            <div class="form-group">
                <label for="day-absent">Day Absent:</label>
                <input id="day-absent" class="form-control" type="text" name="day" value="{{ old('day', $absent->day) }}">
            </div>

            @if (!$absent->exists)
            <div class="form-group">
                <label for="user-id">User ID:</label>
                <input id="user-id" class="form-control" type="text" name="user_id" value="{{ old('user_id') }}">
            </div>
            @endif

            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea class="form-control" rows="3" id="reason" name="reason">{{ old('reason', $absent->reason) }}</textarea>
            </div>

            <div class="d-flex justify-content-around">
                @if (!$absent->exists)
                <button type="submit" class="btn btn-secondary"> Create </button>
                @else
                <button type="submit" class="btn btn-secondary"> Save </button>
                @endif
                <a class="btn btn-secondary" href="{{ route('manage.absents.index') }}" role="button"> Cancel </a>
            </div>     
        </form>
    </div>
</div>
@endsection
