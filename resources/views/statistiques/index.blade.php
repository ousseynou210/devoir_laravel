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
                @foreach ($etudiants as $etudiants)
                    <tr>
                        <td>{{ $etudiants->nom }} {{ $etudiants->prenom }}</td>
                        <td>{{ $etudiants->note->count() }}</td>
                        <td>
                            @if ($etudiants->note->count() > 0)
                                {{ round($etudiants->note->avg('note'), 2) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <h5>Moyenne générale de la classe :
            <strong>{{ round($moyenneGenerale, 2) }}/20</strong>
        </h5>

        <h5>Meilleur étudiant :
            <strong>{{ $meilleurEtudiant->nom }} {{ $meilleurEtudiant->prenom }}</strong>
            avec <strong>{{ round($meilleurEtudiant->note->avg('note'), 2) }}/20</strong>
        </h5>
    </div>
@endsection
