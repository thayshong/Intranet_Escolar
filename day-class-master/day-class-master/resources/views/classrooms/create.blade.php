@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar classe</h2>

        <form action="{{ route('classrooms.store') }}" method="POST">
            @csrf


            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
