@if ($errors->any())
    @foreach ($errors->all() as $message)
    <div class="text-status">
        <span>{{ $message }}</span>
    </div>
    @endforeach
@endif
