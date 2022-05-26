<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;

class ClassroomController extends Controller
{
    /**
     * Listagem de classe.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', ['classrooms' => $classrooms]);
    }
    /**
     * Visualizar uma única classe.
     */
    public function show($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return 'Classe não existe.';
        }

        return view('classrooms.show', ['classroom' => $classroom]);
    }

    /**
     * Formulário de editar uma única classe.
     */
    public function edit($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return 'Classe não existe.';
        }

        return view('classrooms.edit', ['classroom' => $classroom]);
    }

    /**
     * Editar uma única classe.
     */
    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return 'Classe não existe.';
        }

        $payload = $request->all();

        $classroom->update($payload);

        return redirect()->route('classrooms.index');
    }

    /**
     * Formulário de criar uma única classe.
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Criar uma única classe.
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        Classroom::create($payload);

        return redirect()->route('classrooms.index');
    }

    /**
     * Deletar uma única classe. 
     */
    public function destroy($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return 'Classe não existe.';
        }

        $classroom->delete();

        return redirect()->route('classrooms.index');
    }
    
    public function class_members($id)
    {
        $classroom = Classroom::find($id);
        $teachers = Teacher::All();
        $students = Student::All();

        if (!$students) {
            return 'Não existem estudantes.';
        }

        return view('../relationships.index_class', ['students' => $students, 'teachers' => $teachers, 'classroom' => $classroom]);
    }
}
