@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de matérias</h2>

        <a href="{{ route('subjects.create') }}" class="btn btn-success mb-4">Adicionar</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <th scope="row">{{ $subject->id }}</th>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-primary">Visualizar</a>
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
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
