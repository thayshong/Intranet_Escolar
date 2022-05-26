@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Listagem de estudantes</h2>

        <a href="{{ route('students.create') }}" class="btn btn-success mb-4 btn-sm"><i
                class="fas fa-add mr-1"></i>Adicionar</a>

        @if (!$students->count())
            <p class="alert alert-warning">Não possui estudantes cadastrados.</p>
        @else
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
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-eye mr-1"></i>Visualizar</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit mr-1"></i>Editar</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash mr-1"></i>Excluir</button>
                                    </form>

                                    <a href="https://wa.me/55{{ preg_replace( '/[^0-9]/', '', $student->cel ); }}?text=Ol%C3%A1%2C%20por%20favor%2C%20entre%20em%20contato%20com%20a%20diretoria%20da%20escola."
                                        class="btn btn-success btn-sm" target="_blank"><i class="fa-brands fa-whatsapp mr-1"></i>Whatsapp
                                        responsável</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
