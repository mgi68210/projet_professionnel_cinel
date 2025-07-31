@extends('layouts.app')

@section('title', 'Tableau de bord administrateur')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')

<div class="admin-dashboard">
    <h1>Bienvenue, {{ $admin->prenom }}</h1>

    <div class="section">
        <h2>Informations personnelles</h2>
        <p><strong>Nom :</strong> {{ $admin->nom }}</p>
        <p><strong>Prénom :</strong> {{ $admin->prenom }}</p>
        <p><strong>Email :</strong> {{ $admin->email }}</p>
    </div>

    <div class="section">
        <h2>Gestion des cours</h2>
        <a href="{{ route('admin.cours.index') }}" class="btn btn-primary">Voir tous les cours</a>
        <a href="{{ route('admin.cours.create') }}" class="btn btn-success">Ajouter un cours</a>
    </div>

    <div class="section">
        <h2>Réservations par cours</h2>
        @php $groupedByCours = $reservations->groupBy('cours.id_cours'); @endphp

        @forelse($groupedByCours as $idCours => $reservationsCours)
            <div class="cours-block">
                <h3>{{ $reservationsCours->first()->cours?->titre ?? 'Cours inconnu' }}</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Date</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservationsCours as $res)
                            <tr>
                                <td>{{ $res->utilisateur?->prenom }} {{ $res->utilisateur?->nom }}</td>
                                <td>{{ \Carbon\Carbon::parse($res->cours?->date_heure)->format('d/m/Y H:i') }}</td>
                                <td>{{ $res->statut }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><strong>Total réservations :</strong> {{ $reservationsCours->count() }}</p>
                <hr>
            </div>
        @empty
            <p>Aucune réservation enregistrée.</p>
        @endforelse
    </div>

    <div class="section">
        <h2>Avis des participants</h2>
        @if($avis->isEmpty())
            <p>Aucun avis disponible.</p>
        @else
            @foreach($avis as $note)
                <div class="avis">
                    <p><strong>{{ $note->utilisateur?->prenom }} {{ $note->utilisateur?->nom }}</strong> a noté <strong>{{ $note->cours?->titre }}</strong></p>
                    <p>Note : {{ $note->note_satisfaction }}/5</p>
                    <p>Commentaire : {{ $note->commentaire }}</p>
                    <hr>
                </div>
            @endforeach
        @endif
    </div>

    <div class="section">
        <h2>Statistiques</h2>
        <p><strong>Réservations totales :</strong> {{ $totalReservations }}</p>
        <p><strong>Utilisateurs actifs :</strong> {{ $utilisateursActifs }}</p>
        <p><strong>Note moyenne des cours :</strong> {{ round($noteMoyenne, 2) }}/5</p>
    </div>
</div>

@endsection
