@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Saisie des notes</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notes.store') }}" method="POST" class="mb-4">
            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="etudiant_id" class="form-label">Étudiant</label>
                    <select name="etudiant_id" id="etudiant_id" class="form-select" required>
                        <option value="">-- Sélectionnez --</option>
                        @foreach ($etudiants as $etudiant)
                            <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="evaluation_id" class="form-label">Évaluation</label>
                    <select name="evaluation_id" id="evaluation_id" class="form-select" required>
                        <option value="">-- Sélectionnez --</option>
                        @foreach ($evaluations as $evaluation)
                            <option value="{{ $evaluation->id }}">{{ $evaluation->titre }} ({{ $evaluation->type }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="note" class="form-label">Note (/20)</label>
                    <input type="number" name="note" id="note" class="form-control" min="0" max="20" step="1" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
@endsection
