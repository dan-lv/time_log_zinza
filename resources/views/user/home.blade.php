@extends('user.layout')
@section('content')
<div class="image">
	@if (session('status'))
	<p class="status">{{ session('status') }}</p>
	@endif
	<h2 class="text">Find Creativity In</h2>
	<h3 class="text">Gray World</h3>
	<div class="container btn-position">
		<div class="wrap">
			<a href="" class="item1" onclick="event.preventDefault(); document.getElementById('check-in').submit();"> Check-in </a>
			<a href="" class="item2"> Absent </a>
			<a href="" class="item3" onclick="event.preventDefault(); document.getElementById('check-out').submit();"> Check-out </a>
		</div>
	</div>
</div>
<form id="check-in" method="POST" action="{{ route('check-ins.store') }}" style="display: none;">
	@csrf
</form>
<form id="check-out" method="POST" action="{{ route('check-outs.store') }}" style="display: none;">
	@csrf
</form>
@endsection
