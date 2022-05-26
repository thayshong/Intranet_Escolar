@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Editar professor</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="id">ID:</label>
                        <input type="text" name="id" class="form-control" value="{{ $teacher->id }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
                    </div>
                    <div class="col-md-4">
                        <label for="classroom_id">Classes</label>
                        <select name="classroom_id" class="form-control">
                            <option hidden selected disabled>Selecine uma classe</option>
                            @foreach ($classrooms as $classroom)
                                <option value={{ $classroom->id }}
                                    {{ $teacher->classroom_id == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-success btn-sm"><i class="far fa-save mr-1"></i>Salvar</button>
            <a href="{{ route('teachers.index') }}" class="btn btn-primary btn-sm"><i
                    class="far fa-arrow-alt-circle-left mr-1"></i>Voltar</a>
        </form>

    </div>
@endsection
