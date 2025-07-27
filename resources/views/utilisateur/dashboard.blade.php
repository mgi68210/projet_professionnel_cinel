@extends('layouts.app')

@section('title', 'Mon tableau de bord')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/utilisateur/dashboard.css') }}">
@endsection


@section('content')

<div class="dashboard-container">
    <h1>Bienvenue, {{ $utilisateur->prenom }}</h1>

    <div class="info-personnelles">
        <h2>Mes informations</h2>
        <p><strong>Nom :</strong> {{ $utilisateur->nom }}</p>
        <p><strong>Prénom :</strong> {{ $utilisateur->prenom }}</p>
        <p><strong>Email :</strong> {{ $utilisateur->email }}</p>
        
    </div>

    <div class="tableau-reservations">
        <h2>Mes réservations de cours</h2>

        @if($coursReserves->isEmpty())
            <p>Vous n’avez réservé aucun cours pour le moment.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Cours</th>
                        <th>Date & Heure</th>
                        <th>Tranche d’âge</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coursReserves as $cours)
                        <tr>
                            <td>{{ $cours->titre }}</td>
                            <td>{{ \Carbon\Carbon::parse($cours->date_heure)->format('d/m/Y H:i') }}</td>
                            <td>{{ $cours->tranche_age ?? 'Non défini' }}</td> {{-- ou $utilisateur->tranche_age --}}
                            <td>{{ $cours->pivot->statut }}</td>
                            <td class="actions">
                           <a href="{{ route('quiz.show', $cours->id_cours) }}">Quiz</a>       

                                @if($cours->noter()->where('id_utilisateur', $utilisateur->id_utilisateur)->exists())
                                    <a href="{{ route('noter.modifier', $cours->id_cours) }}">Modifier avis</a>
                                @else
                                    <a href="{{ route('noter.formulaire') }}">Noter</a>
                                @endif
                                    <form action="{{ route('cours.annuler', $cours->id_cours) }}" method="POST" onsubmit="return confirm('Annuler ce cours ?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Annuler</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
