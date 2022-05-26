@extends('layout.app')

@section('content')
    @include('layout._partials.navbar')

    <div class="container">
        <h2 class="mb-4 mt-4">Adicionar Presença</h2>

        <form action="{{ route('absences.store') }}" method="POST">
            @csrf
            <div class="col">

                <div class="row form-group col-md-5">
                    <label for="classroom_id">Selecione a classe para obter os alunos: </label>
                    <select name="classroom_id" class="form-control">
                        <option hidden selected>Classes</option>
                        @foreach ($classrooms as $classroom)
                            <option value={{ $classroom->id }}>{{ $classroom->name }}</option>     
                        @endforeach
                    </select>
                </div>
                    
                        
                <a href="/absences/create/{{ $classroom->id}}" class="btn btn-primary">Continuar</a>
                <a href="/absences/show" class="btn btn-primary">Ver</a>
                <a href="/absences/edit" class="btn btn-primary">Editar</a>
                <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>

    </div>
@endsection
