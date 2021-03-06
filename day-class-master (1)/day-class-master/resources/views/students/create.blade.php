@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar estudante</h2>

        @include('messages.error')

        <form action="{{ route('students.store') }}" method="POST">
            @csrf


            <div class="row">
                <div class="form-group col-md-3 ">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group col-md-3 ">
                    <label for="cel">Celular responsável:</label>
                    <input class="phone_with_ddd form-control" type="text" name="cel">
                </div>

                <div class="form-group col-md-3">
                    <label for="gender">Sexo:</label>
                    <select name="gender" class="form-control">
                        <option hidden disabled selected>Selecione um sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outros">Outros</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="classroom_id">Classe:</label>
                    <select name="classroom_id" class="form-control">
                        <option hidden selected disabled>Selecione uma classe</option>
                        @foreach ($classrooms as $classroom)
                            <option value={{ $classroom->id }}>{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="birth_date">Data de Nascimento:</label>
                    <input type="date" name="birth_date" class="form-control">
                </div>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('students.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
