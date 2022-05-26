<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Classroom;
use App\Models\Student;

class AbsenceController extends Controller
{
    /**
     * Listagem de falta.
     */
    public function absences($id)
    {
        $absences = Absence::all();
        $students = Student::all();
        $classroom = Classroom::find($id);
        return view('absences.absences', ['absences' => $absences, 'students' => $students, 'classroom' => $classroom]);
    }

    /**
     * Visualizar uma única falta.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('absences.index', ['classrooms' => $classrooms]);
    }
    public function show()
    {
        $absences = Absence::all();
        $students = Student::all();

        if (!$absences) {
            return 'Falta não existe.';
        }

        return view('absences.show', ['absences' => $absences, 'students' => $students]);
    }

    /**
     * Formulário de editar uma única falta.
     */
    public function edit()
    {
        $absences = Absence::all();
        $students = Student::all();

        if (!$absences) {
            return 'Falta não existe.';
        }

        return view('absences.edit', ['absences' => $absences, 'students' => $students]);
    }

    /**
     * Editar uma única falta.
     */
    public function update(Request $request, $id)
    {
        $absence = Absence::find($id);

        if (!$absence) {
            return 'Falta não existe.';
        }

        $payload = $request->all();

        $absence->update($payload);

        return redirect()->route('absences.index');
    }

    /**
     * Formulário de criar uma única falta.
     */
    public function create($id)
    {
        $students = Student::all();
        $classroom = Classroom::find($id);
        return view('absences.create', ['students' => $students, 'classroom' => $classroom]);
    }

    /**
     * Criar uma única falta.
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            Absence::create([
                'date' => $request->date,
                'student_id' => $request->id[$i],
                'name' => $request->name[$i],
                'presence' => $request->presence[$i] ?? 'off'
            ]);
        }

        return redirect()->route('absences.index');
    }

    /**
     * Deletar uma única falta.
     */
    public function destroy($id)
    {
        $absence = Absence::find($id);

        if (!$absence) {
            return 'Falta não existe.';
        }

        $absence->delete();

        return redirect()->route('absences.index');
    }
}
