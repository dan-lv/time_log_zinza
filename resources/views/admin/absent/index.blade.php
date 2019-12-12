@extends('layout')
@section('content')

@include('message_validation')
<div class="container">
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <form method="GET" action="{{ route('ad-absents.create') }}">
                <button class="btn btn-secondary modify-margin" type="submit">Create Absent</button>
            </form>
        </div>   
    </div>
    
    <div class="row trans-table">
        <table id="manage-absents" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Absent From</th>
                    <th scope="col">Absent To</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                    <th scope="col">User Name</th>
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
                        <a href="{{ route('ad-absents.absent_user', $absent->user_id) }}">
                            {{ $absent->user->name }}
                        </a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form method="GET" action="{{ route('ad-absents.edit', $absent->id) }}">
                                    <button class="dropdown-item" type="submit">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('ad-absents.confirm', $absent->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="action" value="1" style="display: none;">
                                    <button class="dropdown-item" type="submit">Accept</button>
                                </form>
                                <form method="POST" action="{{ route('ad-absents.confirm', $absent->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="action" value="2" style="display: none;">
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
</div>
@endsection
