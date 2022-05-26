@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Editar matéria</h2>

        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id">ID:</label>
                        <input type="text" name="id" class="form-control" value="{{ $subject->id }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $subject->name }}">
                    </div>
                </div>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
