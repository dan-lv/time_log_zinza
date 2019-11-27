@extends('user.layout')
@section('content')
<div class="image">
    @if (session('status'))
    <p class="d-flex justify-content-center text-status">{{ session('status') }}</p>
    @endif
    
    <div class="trans-text">
        <h2 class="d-flex justify-content-center">Find Creativity In</h2>
        <h3 class="d-flex justify-content-center">Gray World</h3>
    </div>
    <div class="d-flex justify-content-around trans-btn">
        <form id="check-in" method="POST" action="{{ route('check-ins.store') }}">
            @csrf
            <button type="submit" class="btn btn-secondary">Check-in</button>
        </form>
        <form>
            @csrf
            <button type="submit" class="btn btn-secondary">Absent</button>
        </form>
        <form id="check-out" method="POST" action="{{ route('check-outs.store') }}">
            @csrf
            <button type="submit" class="btn btn-secondary">Check-out</button>
        </form>
    </div>
</div>

@endsection
