@extends('layout')
@section('content')
<div class="container">
    <h4 class="text-center pt-2">Name of Staff: {{ $timeLogs->first()->user->name }}</h4>
    <div class="row trans-table">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timeLogs as $timeLog)
                <tr>
                    <td>{{ $timeLog->day }}</td>
                    <td>{{ $timeLog->check_in }}</td>
                    <td>{{ $timeLog->check_out }}</td>
                    <td>
                        <div class="dropdown">
                            <form method="GET" action="{{ route('manage.timelogs.edit', $timeLog->id) }}">
                                <button class="btn btn-secondary" type="submit">
                                    Edit
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $timeLogs->links()}}</div>
</div>
@endsection
