@extends('layouts.app')

@section('title', 'Mes réservations')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours/mes_reservations.css') }}">
@endsection

@section('content')
<div class="mes-cours-container">
    <h1>Mes réservations</h1>

    @if ($reservations->isEmpty())
        <p>Vous n’avez réservé aucun cours.</p>
    @else
        @foreach ($reservations as $cours)
            <div class="reservation-card">
                <h2>{{ $cours->titre }}</h2>
                <p><strong>Date :</strong> {{ $cours->date_heure }}</p>
                <p><strong>Description :</strong> {{ $cours->description }}</p>
                <p><strong>Statut :</strong> {{ $cours->pivot->statut }}</p>

                <div class="reservation-actions">
                    <form method="POST" action="{{ route('cours.annuler', $cours->id_cours) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-annuler">Annuler la réservation</button>
                    </form>
                    <a href="{{ route('cours.planning') }}" class="btn-planning">Revenir au planning</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
