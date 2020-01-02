<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Day</th>
            <th scope="col">Absent From</th>
            <th scope="col">Absent To</th>
            <th scope="col">Reason</th>
            <th scope="col">Absent Time(hour)</th>
            <td>{{ $absentTime }}</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($absents as $absent)
        <tr>
            <td>{{ $absent->day }}</td>
            <td>{{ $absent->time_absent_from }}</td>
            <td>{{ $absent->time_absent_to }}</td>
            <td>{{ $absent->reason }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
