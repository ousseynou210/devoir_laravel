<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);

        Etudiant::create($request->all());
        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté.');
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant modifié.');
    }

    public function destroy($id)
    {
        Etudiant::destroy($id);
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé.');
    }
}
