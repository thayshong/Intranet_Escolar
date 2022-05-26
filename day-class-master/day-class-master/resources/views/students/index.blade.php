@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de estudantes</h2>

        <a href="{{ route('students.create') }}" class="btn btn-success mb-4">Adicionar</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td> {{ $student->name }}</td>
                        <td><span class="badge badge-dark"> {{ $student->gender }} </span></td>
                        <td> {{ $student->birth_date }}</td>
                        @foreach ($classrooms as $classroom)
                            @if ($student->classroom_id == $classroom->id)
                                <td> {{ $classroom->name }} </td>
                            @endif
                        @endforeach
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">Visualizar</a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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
