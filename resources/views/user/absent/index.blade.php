@extends('layout')
@section('content')

@include('message_validation')
<div class="container">
    <div class="row justify-content-between mt-2">
        <button class="btn btn-secondary mt-2" data-toggle="modal" data-target="#filter_modal">Export Excel</button>
    </div>

    <!-- The Modal -->
    <form method="GET" action="{{ route('absents.export') }}">
        @include('filter_export')
    </form>
    <div class="row mt-3">
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
                    @switch($absent->status)
                    @case(1)
                    <td>Accepted</td>
                    @break
                    
                    @case(2)
                    <td>Deny</td>
                    @break
                    
                    @default
                    <td>Processing</td>
                    @endswitch
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $absents->links()}}</div>
</div>
@endsection
