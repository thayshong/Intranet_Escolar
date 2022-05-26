@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Exibir professor</h2>

        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        @foreach ($classrooms as $classroom)
                            @if ($teacher->classroom_id == $classroom->id)
                                <label>Classe:</label>
                                <input type="text" class="form-control" value="{{ $classroom->name }}" readonly>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
               

            <a href="{{ route('teachers.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>
@endsection
