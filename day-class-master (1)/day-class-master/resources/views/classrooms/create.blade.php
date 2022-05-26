@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar classe</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

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

            <button class="btn btn-success btn-sm"><i class="far fa-save mr-1"></i>Salvar</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-primary btn-sm"><i
                    class="far fa-arrow-alt-circle-left mr-1"></i>Voltar</a>
        </form>

    </div>
@endsection
