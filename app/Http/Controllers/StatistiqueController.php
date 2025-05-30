<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Charger tous les étudiants avec leurs notes
        $etudiants = Etudiant::with('notes')->get(); 


        // Calcul de la moyenne générale de la classe
        $moyenneGenerale = $etudiants->flatMap(function ($etudiant) {
            return $etudiant->notes;
        })->avg('note');

        // Recherche de l'étudiant avec la meilleure moyenne
        $meilleurEtudiant = $etudiants
            ->filter(fn($e) => $e->notes->count() > 0) // filtrer ceux qui ont au moins une note
            ->sortByDesc(fn($e) => $e->notes->avg('note'))
            ->first();

        return view('statistiques.index', compact('etudiants', 'moyenneGenerale', 'meilleurEtudiant'));
    }
}
