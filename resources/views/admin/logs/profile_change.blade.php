@extends('layout')
@section('content')

<div class="container">
    <div class="row mt-2">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="w-25">Time</th>
                    <th scope="col" class="w-75">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->time_change }}</td>
                    <td> Admin:
                        {{ $log->updateUser->name.' '.$log->action.' '.$log->field_change }}
                        <a href="{{ route('profiles.show', $log->user_id) }}"> {{ $log->user->name }}</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">{{ $logs->links()}}</div>
</div>
@endsection
