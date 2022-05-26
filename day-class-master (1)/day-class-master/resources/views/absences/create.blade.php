@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar Presença</h2>

        <form action="{{ route('absences.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-3">
                    <label class="sr-only" for="name">Data</label>
                    <input name="date" type="date" class="form-control mb-2">
                </div>
            </div>

            @foreach ($students as $student)
                <div class="form-row align-items-center">
                    <div class="col-md-6">
                        <label class="sr-only" for="name">Nome</label>
                        <input name="id[]" type="text" class="form-control mb-2" value="{{ $student->id }}" hidden>
                        <input name="name[]" type="text" class="form-control mb-2" value="{{ $student->name }}" readonly>
                    </div>

                    <div class="col-auto">
                        <div class="form-check mb-2">
                            <input name="presence[]" class="form-check-input" type="checkbox" data-toggle="toggle" data-size="sm">
                            <label class="form-check-label" for="presence">
                                Está presente?
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection
