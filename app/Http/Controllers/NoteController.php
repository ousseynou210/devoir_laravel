<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Evaluation;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        $evaluations = Evaluation::all();
        return view('notes.index', compact('etudiants', 'evaluations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        Note::updateOrCreate(
            [
                'etudiant_id' => $request->etudiant_id,
                'evaluation_id' => $request->evaluation_id,
            ],
            ['note' => $request->note]
        );

        return redirect()->back()->with('success', 'Note enregistrée.');
    }
}
