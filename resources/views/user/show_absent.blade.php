@extends('user.layout')
@section('content')
<div class="container">
    <div class="row trans-table">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Day</th>
                    <th scope="col">Absent From</th>
                    <th scope="col">Absent To</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absents as $absent)
                <tr>
                    <th scope="row">{{ $absent->id }}</th>
                    <td>{{ $absent->day }}</td>
                    <td>{{ $absent->time_absent_from }}</td>
                    <td>{{ $absent->time_absent_to }}</td>
                    <td>{{ $absent->reason }}</td>
                    <td>{{ $absent->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $absents->links()}}</div>
</div>
@endsection
