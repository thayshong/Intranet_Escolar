@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de classes</h2>

        <a href="{{ route('classrooms.create') }}" class="btn btn-success mb-4 btn-sm"><i
                class="fas fa-add mr-1"></i>Adicionar</a>

        @include('messages.error')
        @include('messages.success')

        @if (!$classrooms->count())
            <p class="alert alert-warning">Não possui classes cadastradas.</p>
        @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
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
                                    <a href="{{ route('classrooms.show', $classroom->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-eye mr-1"></i>Visualizar</a>
                                    <a href="{{ route('classrooms.edit', $classroom->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit mr-1"></i>Editar</a>
                                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST">
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
