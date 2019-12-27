Hello <strong>{{ $name }}</strong>,
<p>Your absent day: {{ $day }} was</p>
@if ($status == 1)
    <p style="color: red;"> Accepted </p>
@else
    <p style="color: red;"> Deny </p>
@endif
