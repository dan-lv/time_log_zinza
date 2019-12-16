@extends('layout')
@section('content')
<div class="container">
    @include('status')
    @include('message_validation')
    <div class="row trans-form">
        <div class="col-4 avatar">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('/images/'.$profile->image) }}" class="card-img-top" alt="Avatar">
                <div class="card-body">
                    <h5 class="card-title">{{ $profile->fullname }}</h5>
                    <p class="card-text"></p>
                    <form method="POST" action="{{ route('profiles.avatar') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Avatar</button>
                    </form>                 
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('profiles.update', $profile->user_id) }}" class="col-8 form-profile d-flex flex-column justify-content-around">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname', $profile->fullname) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <select class="custom-select" id="gender" name="gender">
                        <option value="{{ old('gender', $profile->gender) }}" selected="">
                            @if (old('gender', $profile->gender) == 0)
                            Male
                            @endif
                            @if (old('gender', $profile->gender) == 1)
                            Female
                            @endif
                        </option>
                        <option value="{{ 1 - old('gender', $profile->gender) }}">
                            @if ((1 - old('gender', $profile->gender)) == 0)
                            Male
                            @endif
                            @if ((1 - old('gender', $profile->gender)) == 1)
                            Female
                            @endif
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-8">
                    <input id="birthday" class="form-control" type="text" name="birthday" placeholder="Your Birthday is empty" value="{{ old('birthday', $profile->birthday) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone is empty" value="{{ old('phone', $profile->phone_number) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Your Address is empty" value="{{ old('address', $profile->address) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="position" class="col-sm-2 col-form-label">Position</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="position" name="position" placeholder="Your Position is empty" value="{{ old('position', $profile->position) }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </div>
        </form>       
    </div>  
</div>
@endsection

@section('scripts')
<script>
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    });
</script>
@endsection
