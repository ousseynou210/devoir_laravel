<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|string|max:100',
        ]);

        Evaluation::create($request->all());
        return redirect()->route('evaluations.index')->with('success', 'Évaluation ajoutée.');
    }

    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        return view('evaluations.edit', compact('evaluation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|string|max:100',
        ]);

        $evaluation = Evaluation::findOrFail($id);
        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Évaluation modifiée.');
    }

    public function destroy($id)
    {
        Evaluation::destroy($id);
        return redirect()->route('evaluations.index')->with('success', 'Évaluation supprimée.');
    }
}
