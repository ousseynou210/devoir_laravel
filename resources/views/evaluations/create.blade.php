@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Ajouter une évaluation</h3>


        <form action="{{ route('evaluations.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">-- Sélectionnez --</option>
                    <option value="examen" {{ old('type') == 'examen' ? 'selected' : '' }}>Examen</option>
                    <option value="devoir" {{ old('type') == 'devoir' ? 'selected' : '' }}>Devoir</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
