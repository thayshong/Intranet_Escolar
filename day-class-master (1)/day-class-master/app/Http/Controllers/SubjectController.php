<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
     /**
     * Listagem de materia(sujeito).
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', ['subjects' => $subjects]);
    }
    /**
     * Visualizar uma única materia(sujeito).
     */
    public function show($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return 'Matéria não existe.';
        }

        return view('subjects.show', ['subject' => $subject]);
    }

    /**
     * Formulário de editar uma única materia(sujeito).
     */
    public function edit($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return 'Matéria não existe.';
        }

        return view('subjects.edit', ['subject' => $subject]);
    }

    /**
     * Editar uma única materia(sujeito).
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return 'Matéria não existe.';
        }

        $payload = $request->all();

        $subject->update($payload);

        return redirect()->route('subjects.index');
    }

    /**
     * Formulário de criar uma única materia(sujeito).
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Criar uma única materia(sujeito).
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        Subject::create($payload);

        return redirect()->route('subjects.index');
    }

    /**
     * Deletar uma única materia(sujeito).
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return 'Matéria não existe.';
        }

        $subject->delete();

        return redirect()->route('subjects.index');
    }
}
