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
        <form id="form-check-in" method="POST" action="{{ route('check-ins.store') }}">
            @csrf
            <button id="btn-check-in" class="btn btn-secondary btn-modify" data-toggle="modal" data-target="#myModal">Check-in</button>                
        </form>
        <form id="form-absent" method="GET" action="{{ route('absents.create') }}">
            <button id="btn-absent" class="btn btn-secondary btn-modify">Absent</button>   
        </form>            
        <form id="form-check-out" method="POST" action="{{ route('check-outs.store') }}">
            @csrf
            <button id="btn-check-out" class="btn btn-secondary btn-modify" data-toggle="modal" data-target="#myModal">Check-out</button>                
        </form>
    </div>

    <!-- The Modal -->
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
                    <button id="confirm" type="submit" class="btn btn-danger" data-form="">Confirm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
