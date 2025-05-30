@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Modifier l'étudiant</h3>


        <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $etudiant->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $etudiant->prenom }}" required>
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control"
                       value="{{ $etudiant->date_naissance }}" required>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
