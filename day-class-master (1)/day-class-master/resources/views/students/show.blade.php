@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Exibir estudante</h2>

        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}" readonly>
                    </div>

                    <div class="form-group col-md-3 ">
                        <label for="cel">Celular responsável:</label>
                        <input class="phone_with_ddd form-control" type="text" name="cel" value="{{ $student->cel }}" readonly>
                    </div>

                    <div class="col-md-2">
                        <label for="gender">Sexo:</label>
                        <input type="text" name="gender" class="form-control" value="{{ $student->gender }}" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="birth_date">Data de Nascimento:</label>
                        <input type="date" name="birth_date" class="form-control" value="{{ $student->birth_date }}"
                            readonly>
                    </div>
                    <div>
                        <div class="col-md-10">
                            @foreach ($classrooms as $classroom)
                                @if ($student->classroom_id == $classroom->id)
                                    <label>Classe:</label>
                                    <input type="text" class="form-control" value="{{ $classroom->name }}" readonly>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('students.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
