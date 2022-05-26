@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de classes</h2>

        <a href="{{ route('classrooms.create') }}" class="btn btn-success mb-4">Adicionar</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                    <tr>
                        <th scope="row">{{ $classroom->id }}</th>
                        <td>{{ $classroom->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('classrooms.show', $classroom->id) }}" class="btn btn-primary">Visualizar</a>
                                <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST">
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
