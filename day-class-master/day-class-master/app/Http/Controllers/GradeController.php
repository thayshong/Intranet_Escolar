<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class GradeController extends Controller
{
    /**
     * Listagem de nota.
     */
    public function index()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('grades.index', ['grades' => $grades, 'students' => $students, 'subjects' => $subjects]);
    }
    /**
     * Visualizar uma única nota.
     */
    public function show($id)
    {
        $grade = Grade::find($id);
        $students = Student::all();
        $subjects = Subject::all();

        if (!$grade) {
            return 'Nota não existe.';
        }

        return view('grades.show', ['grade' => $grade, 'students' => $students, 'subjects' => $subjects]);
    }

    /**
     * Formulário de editar uma única nota.
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        $students = Student::all();
        $subjects = Subject::all();

        if (!$grade) {
            return 'Nota não existe.';
        }

        return view('grades.edit', ['grade' => $grade,'students' => $students, 'subjects' => $subjects]);
    }

    /**
     * Editar uma única nota.
     */
    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);

        if (!$grade) {
            return 'Nota não existe.';
        }

        $payload = $request->all();

        $grade->update($payload);

        return redirect()->route('grades.index');
    }

    /**
     * Formulário de criar uma única nota.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();

        if (!$students) {
            return 'Estudantes não existem.';
        }elseif(!$subjects){
            return 'Disciplinas não cadastradas.';
        }else{
            return view('grades.create', ['students' => $students, 'subjects' => $subjects]);
        }
    }

    /**
     * Criar uma única nota.
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        Grade::create($payload);

        return redirect()->route('grades.index');
    }

    /**
     * Deletar uma única nota.
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);

        if (!$grade) {
            return 'Nota não existe.';
        }

        $grade->delete();

        return redirect()->route('grades.index');
    }
}
