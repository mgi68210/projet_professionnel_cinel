@extends('layouts.app')

@section('content')
    <h1>Confirmer votre réservation</h1>

    <p><strong>Cours :</strong> {{ $cours->titre }}</p>
    <p><strong>Date :</strong> {{ $cours->date_heure }}</p>
    <p><strong>Description :</strong> {{ $cours->description }}</p>

<form method="POST" action="{{ route('cours.reserver', $cours->id_cours) }}">
    @csrf
    <button type="submit">Confirmer la réservation</button>
    <a href="{{ route('cours.planning') }}">Annuler</a>
</form>

@endsection
