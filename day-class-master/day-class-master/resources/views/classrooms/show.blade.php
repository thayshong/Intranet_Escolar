@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Exibir classe</h2>

        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id">ID:</label>
                        <input type="text" name="id" class="form-control" value="{{ $classroom->id }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $classroom->name }}" readonly>
                    </div>
                </div>
            </div>

            <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
