@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Exibir Aluno</h2>

        <form>
            <div class="form-group">
                @foreach($absences as $absence)
                <div class="row">
                    <div class="col-md-6">
                        @foreach ($students as $student)
                            @if($student->id == $absence->student_id)
                                <label>Aluno:</label>
                                <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label for="date">Data:</label>
                        <input type="text" name="date" class="form-control" value="{{ $absence->date }}" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="presence">Presença:</label>
                        <input type="text" name="presence" class="form-control" value="{{ $absence->presence }}" readonly>
                    </div>
                </div>
                @endforeach
            </div>

            <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
