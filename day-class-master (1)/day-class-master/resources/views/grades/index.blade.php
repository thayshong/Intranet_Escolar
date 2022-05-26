@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de notas</h2>

        <a href="{{ route('grades.create') }}" class="btn btn-success mb-4 btn-sm"><i
            class="fas fa-add mr-1"></i>Adicionar</a>

        @if (!$grades->count())
            <p class="alert alert-warning">Não possui notas cadastradas.</p>
        @else
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
                                @if ($grade->student_id == $student->id)
                                    <td> {{ $student->name }} </td>
                                @endif
                            @endforeach
                            @foreach ($subjects as $subject)
                                @if ($grade->subject_id == $subject->id)
                                    <td> {{ $subject->name }} </td>
                                @endif
                            @endforeach
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('grades.show', $grade->id) }}"
                                        class="btn btn-primary btn-sm"><i
                                            class="fas fa-eye mr-1"></i>Visualizar</a>
                                    <a href="{{ route('grades.edit', $grade->id) }}"
                                        class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit mr-1"></i>Editar</a>
                                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash mr-1"></i>Excluir</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
