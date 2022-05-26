@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de professores</h2>

        <a href="{{ route('teachers.create') }}" class="btn btn-success mb-4">Adicionar</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <th scope="row">{{ $teacher->id }}</th>
                        <td>{{ $teacher->name }}</td>
                        @foreach ($classrooms as $classroom)
                        @if ($teacher->classroom_id == $classroom->id)
                            <td> {{ $classroom->name }} </td>
                        @endif
                        @endforeach
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-primary">Visualizar</a>
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
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
