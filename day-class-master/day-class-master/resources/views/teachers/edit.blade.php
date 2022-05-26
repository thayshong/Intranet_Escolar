@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Editar professor</h2>

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id">ID:</label>
                        <input type="text" name="id" class="form-control" value="{{ $teacher->id }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
                    </div>
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
