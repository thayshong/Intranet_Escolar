@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Editar estudante</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                    </div>
                    <div class="col-md-3">
                        <label for="gender">Sexo</label>
                        <select name="gender" class="form-control">
                            <option hidden disabled>Sexo</option>
                            <option value="masculino" {{ $student->gender == 'masculino' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="feminino" {{ $student->gender == 'feminino' ? 'selected' : '' }}>Feminino
                            </option>
                            <option value="outros" {{ $student->gender == 'outros' ? 'selected' : '' }}>outros</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="birth_date">Data de Nascimento:</label>
                        <input type="date" name="birth_date" class="form-control" value="{{ $student->class }}">
                    </div>
                    <div class="col-md-3">
                        <label for="classroom_id">Classe</label>
                        <select name="classroom_id" class="form-control">
                            <option hidden disabled>Classe</option>
                            @foreach ($classrooms as $classroom)
                                <option value={{ $classroom->id }}
                                    {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('students.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
