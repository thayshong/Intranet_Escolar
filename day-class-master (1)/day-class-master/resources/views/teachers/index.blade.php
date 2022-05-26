@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de professores</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-success mb-4 btn-sm"><i
                class="fas fa-add mr-1"></i>Adicionar</a>

        @if (!$teachers->count())
            <p class="alert alert-warning">Não possui professores cadastrados.</p>
        @else
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
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
                                    <td> <a class="badge badge-primary"
                                            href="{{ route('classrooms.show', $classroom->id) }}">{{ $classroom->name }}</a>
                                    </td>
                                @endif
                            @endforeach
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-eye mr-1"></i>Visualizar</a>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit mr-1"></i>Editar</a>
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger"><i
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
