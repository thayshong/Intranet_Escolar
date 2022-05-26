@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Editar nota</h2>

        <form action="{{ route('grades.update', $grade->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="value">Nota:</label>
                        <input type="text" name="value" class="form-control" value="{{ $grade->value }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="student_id">Alunos</label>
                        <select name="student_id" class="form-control">
                            <option hidden selected>Alunos</option>
                            @foreach ($students as $student)
                                <option value={{ $student->id }}>{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="subject_id">Disciplinas</label>
                        <select name="subject_id" class="form-control">
                            <option hidden selected>Disciplinas</option>
                            @foreach ($subjects as $subject)
                                <option value={{ $subject->id }}>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('grades.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
