@extends('layout')
@section('content')
<div class="cover-image">
    @include('status')
    <div class="container pt-3">
        @if (!$timeLog->exists)
        <form class="form-absent container" method="POST" action="{{ route('manage.timelogs.store') }}">
        @else
        <form class="form-absent container" method="POST" action="{{ route('manage.timelogs.update', $timeLog->id) }}">
        @method('PUT')
        @endif
            @csrf
            <h2 class="d-flex justify-content-center"> Fill the following form </h2>
            @include('message_validation')
            <div class="form-group">
                <label for="check-in-time">Check In Time:</label>
                <input type="text" name="check_in_time" class="form-control timepicker" id="check-in-time" value="{{ old('check_in_time', $timeLog->check_in) }}">
            </div>

            <div class="form-group">
                <label for="check-out-time">Check Out Time:</label>
                <input type="text" name="check_out_time" class="form-control timepicker" id="check-out-time" value="{{ old('check_out_time', $timeLog->check_out) }}">
            </div>
            
            <div class="form-group">
                <label for="day-timelog">Day:</label>
                <input id="day-timelog" class="form-control text-center" type="text" name="day" value="{{ old('day', $timeLog->day) }}">
            </div>

            <div class="form-group">
                <label for="user-id">User:</label>
                @if (!$timeLog->exists)
                <select id="user-id" name="user_id" class="custom-select">
                    <option></option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if (old('user_id', $timeLog->user_id) == $user->id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
                @else
                <select id="user-id" name="user_id" class="custom-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if (old('user_id', $timeLog->user_id) == $user->id) selected @else disabled @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
                @endif
            </div>

            <div class="d-flex justify-content-around">
                @if (!$timeLog->exists)
                <button type="submit" class="btn btn-secondary"> Create </button>
                @else
                <button type="submit" class="btn btn-secondary"> Save </button>
                @endif
                <a class="btn btn-secondary" href="{{ route('manage.timelogs.index') }}" role="button"> Cancel </a>
            </div>
        </form>
    </div>
</div>
@endsection
