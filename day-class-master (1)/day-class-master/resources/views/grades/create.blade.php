@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar nota</h2>

        @include('messages.error')

        <form action="{{ route('grades.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="value">Nota:</label>
                    <input type="text" name="value" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label for="student_id">Estudante:</label>
                    <select name="student_id" class="form-control">
                        <option hidden selected>Estudante</option>
                        @foreach ($students as $student)
                            <option value={{ $student->id }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="subject_id">Disciplina:</label>
                    <select name="subject_id" class="form-control">
                        <option hidden selected>Disciplina</option>
                        @foreach ($subjects as $subject)
                            <option value={{ $subject->id }}>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <button class="btn btn-success ">Salvar</button>
            <a href="{{ route('grades.index') }}" class="btn btn-primary">Voltar</a>
        </form>


    </div>
@endsection
