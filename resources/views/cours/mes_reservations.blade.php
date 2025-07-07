@extends('layouts.app')

@section('content')
    <h1>Mes réservations</h1>

    @forelse ($reservations as $cours)
        <div style="border: 1px solid #ccc; margin-bottom: 1rem; padding: 1rem;">
            <h2>{{ $cours->titre }}</h2>
            <p>{{ $cours->description }}</p>
            <p><strong>Date :</strong> {{ $cours->date_heure }}</p>
            <p><strong>Statut :</strong> {{ $cours->pivot->statut }}</p>
            <p><strong>Réservé le :</strong> {{ $cours->pivot->date_reservation }}</p>
        </div>
    @empty
        <p>Vous n’avez réservé aucun cours pour le moment.</p>
    @endforelse
@endsection
