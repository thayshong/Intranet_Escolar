@if (Session::get('status') === 'success')
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif
