<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullcalenderController extends Controller
{
    /**
     * Listagem de falta.
     */
    public function index()
    {
        return view('absences.fullcalender');
    }

    /**
     * Visualizar uma única falta.
     */
    public function show($id)
    {
        $absence = Absence::find($id);

        if (!$absence) {
            return 'Falta não existe.';
        }

        return view('absences.show', ['absence' => $absence]);
    }

    /**
     * Formulário de editar uma única falta.
     */
    public function edit($id)
    {
        $absence = Absence::find($id);

        if (!$absence) {
            return 'Falta não existe.';
        }

        return view('absences.edit', ['absence' => $absence]);
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
    public function create()
    {
        return view('absences.create');
    }

    /**
     * Criar uma única falta.
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        Absence::create($payload);

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
