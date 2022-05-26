<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Listagem de professores.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('teachers.index', ['teachers' => $teachers, 'classrooms' => $classrooms]);
    }

    /**
     * Visualizar um único professor.
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        $classrooms = Classroom::all();

        if (!$teacher) {
            return 'Professor não existe.';
        }

        return view('teachers.show', ['teacher' => $teacher, 'classrooms' => $classrooms]);
    }

    /**
     * Formulário de editar um único professor.
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $classrooms = Classroom::all();

        if (!$teacher) {
            return 'Professor não existe.';
        }

        return view('teachers.edit', ['teacher' => $teacher, 'classrooms' => $classrooms]);
    }

    /**
     * Editar um único professor.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return 'Professor não existe.';
        }

        $payload = $request->all();

        $teacher->update($payload);

        return redirect()->route('teachers.index');
    }

    /**
     * Formulário de criar um único professor.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('teachers.create', ['classrooms' => $classrooms]);
    }

    /**
     * Criar um único professor.
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        Teacher::create($payload);

        return redirect()->route('teachers.index');
    }

    /**
     * Deletar um único professor.
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return 'Professor não existe.';
        }

        $teacher->delete();

        return redirect()->route('teachers.index');
    }
}
