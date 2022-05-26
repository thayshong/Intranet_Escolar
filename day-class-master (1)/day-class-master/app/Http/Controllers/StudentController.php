<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Listagem de estudante.
     */
    public function index()
    {
        //TODO: relacionamento entre classe e aluno
        //$students = Student::with(['classroom'])->get();
        // return $students;

        $students = Student::All();
        $classrooms = Classroom::All();
        return view('students.index', ['students' => $students, 'classrooms' => $classrooms]);
    }
    /**
     * Visualizar um único estudante.
     */
    public function show($id)
    {
        $student = Student::find($id);
        $classrooms = Classroom::all();

        if (!$student) {
            return 'Estudante não existe.';
        }


        return view('students.show', ['student' => $student, 'classrooms' => $classrooms]);
    }

    /**
     * Formulário de editar um único estudante.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $classrooms = Classroom::all();

        if (!$student) {
            return 'Estudante não existe.';
        }

        return view('students.edit', ['student' => $student, 'classrooms' => $classrooms]);
    }

    /**
     * Editar um único estudante.
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return 'Estudante não existe.';
        }

        $payload = $request->all();

        $student->update($payload);

        return redirect()->route('students.index');
    }

    /**
     * Formulário de criar um único estudante.
     */
    public function create()
    {
        $classrooms = Classroom::all();

        return view('students.create', ['classrooms' => $classrooms]);
    }

    /**
     * Criar um único estudante.
     */
    public function store(StudentRequest $request)
    {
        $payload = $request->all();

        Student::create($payload);

        return redirect()->route('students.index');
    }

    /**
     * Deletar um único estudante.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return 'Estudante não existe.';
        }

        $student->delete();

        return redirect()->route('students.index');
    }


}


