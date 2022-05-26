@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

@if (Session::get('status') === 'error')
    <div class="alert alert-danger">
        {{Session::get('message')}}
    </div>
@endif
