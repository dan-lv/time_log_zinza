@extends('layout')
@section('content')
<div class="container">
    <div class="row trans-table">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timeLogs as $timeLog)
                <tr>
                    <td>{{ $timeLog->day }}</td>
                    <td>{{ $timeLog->check_in }}</td>
                    <td>{{ $timeLog->check_out }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $timeLogs->links()}}</div>
</div>
@endsection
