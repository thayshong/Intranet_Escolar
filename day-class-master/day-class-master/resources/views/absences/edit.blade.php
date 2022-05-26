@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Editar frequencia</h2>

        @foreach($absences as $absence)
        <form action="{{ route('absences.update', $absence->id) }}" method="POST">
            @csrf
            @method('PUT')

     
            <div class="form-group">
                <div class="row">
                    
                    <div class="col-md-6">
                        <label for="date">Data:</label>
                        <input type="date" name="date" class="form-control" value="{{ $absence->date }}">
                    </div>


                    <div class="form-group col-md-3">
                        <label for="student_id">Alunos</label><select name="student_id" class="form-control">
                            <option hidden disabled>Aluno</option>
                            @foreach($students as $student)
                            <option value="{{$student->id}}" {{ $student->id == $absence->student_id ? 'selected' : '' }}>
                                {{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="presence">Status:</label>
                        <input type="text" name="presence" class="form-control" value="{{ $absence->presence }}">
                    </div>
                </div>
            </div>
            
            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Voltar</a>
        </form>
        @endforeach
    </div>
@endsection
