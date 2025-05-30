@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Liste des évaluations</h3>

        <a href="{{ route('evaluations.create') }}" class="btn btn-primary mb-3">Ajouter une évaluation</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>titre</th>
                    <th>Date</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($evaluations as $evaluation)
                    <tr>
                        <td>{{ $evaluation->titre }}</td>
                        <td>{{ \Carbon\Carbon::parse($evaluation->date)->format('d/m/Y') }}</td>
                        <td>
                            @if ($evaluation->type == 'examen')
                                <span class="badge bg-danger">Examen</span>
                            @elseif ($evaluation->type == 'devoir')
                                <span class="badge bg-info">Devoir</span>
                            @else
                                <span class="badge bg-secondary">Inconnu</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucune évaluation enregistrée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
