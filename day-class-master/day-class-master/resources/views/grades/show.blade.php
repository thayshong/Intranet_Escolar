@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Exibir nota</h2>

        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id">ID:</label>
                        <input type="text" name="id" class="form-control" value="{{ $grade->id }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="value">Nota:</label>
                        <input type="text" name="value" class="form-control" value="{{ $grade->value }}" readonly>
                    </div>
                    <div class="col-md-6">
                        @foreach ($students as $student)
                            @if ($grade->student_id == $student->id)
                                <label>Aluno:</label>
                                <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        @foreach ($subjects as $subject)
                            @if ($grade->subject_id == $subject->id)
                                <label>Disciplina:</label>
                                <input type="text" class="form-control" value="{{ $subject->name }}" readonly>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <a href="{{ route('grades.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
