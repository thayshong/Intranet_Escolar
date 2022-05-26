@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de matérias</h2>

        <a href="{{ route('subjects.create') }}" class="btn btn-success mb-4 btn-sm"><i
            class="fas fa-add mr-1"></i>Adicionar</a>

        @if (!$subjects->count())
            <p class="alert alert-warning">Não possui matérias cadastradas.</p>
        @else
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
                                    <a href="{{ route('subjects.show', $subject->id) }}"
                                        class="btn btn-primary btn-sm"><i
                                            class="fas fa-eye mr-1"></i>Visualizar</a>
                                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit mr-1"></i>Editar</a>
                                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
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
