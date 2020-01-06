<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Day</th>
            <th scope="col">Check In</th>
            <th scope="col">Check Out</th>
            <th scope="col">Staff Name</th>
            <th scope="col">Working Time(hour)</th>
            <td>{{ $workingTime }}</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($timeLogs as $timeLog)
        <tr>
            <td>{{ $timeLog->day }}</td>
            <td>{{ $timeLog->check_in }}</td>
            <td>{{ $timeLog->check_out }}</td>
            <td>
                {{ $timeLog->user->name }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
