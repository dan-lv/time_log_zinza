@if ($errors->any())
    @foreach ($errors->all() as $message)
    <div class="text-danger text-center">
        <span>{{ $message }}</span>
    </div>
    @endforeach
@endif
