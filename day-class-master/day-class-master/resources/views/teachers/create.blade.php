@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar professor</h2>

        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control">
                </div>



                <div class="form-group col-md-3">
                    <label for="classroom_id">Classes</label>
                    <select name="classroom_id" class="form-control">
                        <option hidden selected>Classes</option>
                        @foreach ($classrooms as $classroom)
                            <option value={{ $classroom->id }}>{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('teachers.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
