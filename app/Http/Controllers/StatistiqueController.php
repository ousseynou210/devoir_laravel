<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::with('notes')->get();

        $resultats = $etudiants->map(function($e) {
            $moyenne = $e->notes->avg('note');
            return [
                'etudiant' => $e,
                'moyenne' => round($moyenne, 2)
            ];
        });

        $meilleur = $resultats->sortByDesc('moyenne')->first();
        $moyenneGenerale = round($resultats->pluck('moyenne')->avg(), 2);

        return view('statistiques.index', compact('resultats', 'meilleur', 'moyenneGenerale'));
    }
}
