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
        <button id="btn-check-in" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Check-in</button>
        <button id="btn-absent" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Absent</button>
        <button id="btn-check-out" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Check-out</button>
    </div>

    <!-- The Modal -->
    @if (Auth::check())
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Confirm Before
                </div>
                <!-- Modal footer -->
                <div class="modal-footer d-flex justify-content-around">
                    <form id="form" method="POST" action="">
                        @csrf
                        <button id="confirm" type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Please <a href="{{ route('login') }}">Login Here!</a>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
