@extends('user.layout')
@section('content')
<div class="image">
    @if (session('status'))
    <p class="text-status">{{ session('status') }}</p>
    @endif
    <div class="container modify">
        <form class="form-absent container" method="POST" action="{{ route('absents.store') }}" >
            @csrf
            <h2 class="d-flex justify-content-center"> Fill the following form </h2>
            <div class="form-group">
                <label for="timepicker1">Absent from:</label>
                <input type="text" name="absent-from" class="form-control timepicker" id="timepicker1">
            </div>

            <div class="form-group">
                <label for="timepicker1">Absent to:</label>
                <input type="text" name="absent-to" class="form-control timepicker" id="timepicker2">
            </div>
            
            <div class="form-group">
                <label for="datepicker">Day Absent:</label>
                <input id="datepicker" class="form-control input-group date" type="text" name="date" data-date-format="yyyy-mm-dd" readonly />
            </div>

            <div class="form-group">
                @foreach ($errors->all() as $error)
                <div class="text-status">
                    <span>{{ $error }}</span>
                </div>
                @endforeach
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
