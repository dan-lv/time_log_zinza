<strong>Notification</strong>,
<p>List User Miss TimeLog Day: {{ $day }}</p>
<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($miss_timelog_users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<p>List User Miss CheckOut Day: {{ $day }}</p>
<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($miss_check_out_users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
