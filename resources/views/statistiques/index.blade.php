@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Statistiques des étudiants</h3>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Nombre de notes</th>
                    <th>Moyenne (/20)</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($etudiants as $etudiant)
    <tr>
                <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->notes->count() }}</td>
                <td>
            @if ($etudiant->notes->count() > 0)
                {{ round($etudiant->notes->avg('note'), 2) }}
            @else
                N/A
            @endif
                </td>
    </tr>
                @endforeach

            </tbody>
        </table>

        <hr>

       @if ($meilleurEtudiant)
    <h5>Meilleur étudiant :
        <strong>{{ $meilleurEtudiant->nom }} {{ $meilleurEtudiant->prenom }}</strong>
        avec <strong>{{ round($meilleurEtudiant->notes->avg('note'), 2) }}/20</strong>
    </h5>
@else
    <h5>Aucun étudiant noté pour le moment.</h5>
@endif

    </div>
@endsection
