@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de notas</h2>

        <a href="{{ route('grades.create') }}" class="btn btn-success mb-4">Adicionar</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Notas</th>
                    <th scope="col">Alunos</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td scope="row"> {{ $grade->value }}</td>
                        @foreach ($students as $student)
                            @if($grade->student_id == $student->id)
                            <td> {{ $student->name }} </td>
                            @endif
                        @endforeach
                        @foreach ($subjects as $subject)
                            @if($grade->subject_id == $subject->id)
                            <td> {{ $subject->name }} </td>
                            @endif
                        @endforeach
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('grades.show', $grade->id) }}" class="btn btn-primary">Visualizar</a>
                                <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Excluir</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
