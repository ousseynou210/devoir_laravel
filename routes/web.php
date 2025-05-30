<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StatistiqueController;

Route::get('/', [EtudiantController::class, 'index']);
Route::resource('etudiants', EtudiantController::class);
Route::resource('evaluations', EvaluationController::class);
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');


