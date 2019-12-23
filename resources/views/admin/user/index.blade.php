@extends('layout')
@section('content')
<div class="container">
    @include('status')
    <div class="row mt-3">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @switch($user->role)
                    @case(1)
                    <td>Admin</td>
                    @break
                    
                    @default
                    <td>Staff</td>
                    @endswitch
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form method="GET" action="{{ route('profiles.show', $user->id) }}">
                                    <button class="dropdown-item" type="submit">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('manage.users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit">Delete</button>
                                </form>
                                <form method="GET" action="{{ route('manage.users.timelogs.index', $user->id) }}">
                                    <button class="dropdown-item" type="submit">List TimeLogs</button>
                                </form>
                                <form method="GET" action="{{ route('manage.users.absents.index', $user->id) }}">
                                    <button class="dropdown-item" type="submit">List Absents</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $users->links()}}</div>
</div>
@endsection
