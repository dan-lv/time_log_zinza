@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-end pt-2">
        <form method="GET" action="{{ route('manage.timelogs.create') }}">
            <button class="btn btn-secondary">Create Time Log</button>
        </form>
    </div>
    <div class="row trans-table">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Name Staff</th>
                    <th scope="col">User ID</th>
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
                        <a href="{{ route('manage.timelogs.timelog_user', $timeLog->user_id) }}">
                            {{ $timeLog->user->name }}
                        </a> 
                    </td>
                    <td>{{ $timeLog->user_id }}</td>
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
