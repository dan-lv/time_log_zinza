@extends('layout')
@section('content')

@include('message_validation')
<div class="container">
    @if (!$absents->isEmpty())
    <h4 class="text-center pt-2">Name of Staff: {{ $absents->first()->user->name }}</h4>

    <div class="row justify-content-between mt-2">
        <button class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Export Excel</button>
    </div>
    @endif

    <!-- The Modal -->
    <form method="GET" action="{{ route('manage.users.absents.export', $absents->first()->user_id) }}">
        @include('filter_export')
    </form>
    <div class="row mt-2">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Absent From</th>
                    <th scope="col">Absent To</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absents as $absent)
                <tr>
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form method="GET" action="{{ route('manage.absents.edit', $absent->id) }}">
                                    <button class="dropdown-item" type="submit">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('manage.absents.confirm', $absent->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="1">
                                    <button class="dropdown-item" type="submit">Accept</button>
                                </form>
                                <form method="POST" action="{{ route('manage.absents.confirm', $absent->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="2">
                                    <button class="dropdown-item" type="submit">Deny</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $absents->links()}}</div>
</div>
@endsection
