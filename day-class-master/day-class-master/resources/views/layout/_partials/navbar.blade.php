<nav class="container navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Class Day</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Página inicial </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('teachers.index') }}">Professores </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('classrooms.index') }}">Classes </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('subjects.index') }}">Matérias </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('grades.index') }}">Notas </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('students.index') }}">Estudantes </a>
            </li>
            <li class="nav-item active">
                {{-- <a class="nav-link" href="{{ route('absences.index') }}">Frequencia </a> --}}
            </li>
        </ul>
    </div>
</nav>
