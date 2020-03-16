@if (count($errors->all()) > 0)
    <div class="alert alert-danger">
        <ul class="pb-0 mb-0">
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif