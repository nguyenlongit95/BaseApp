@if (\Session::has('success'))
    <div class="alert alert-success error-messages">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger error-messages ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif