@extends('layouts.app')

@section('title', 'Confirmer la réservation')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/cours/confirmer.css') }}">
@endsection

@section('content')
<div class="confirm-container">
    <h1>Confirmer votre réservation</h1>

    <p><strong>Cours :</strong> {{ $cours->titre }}</p>
    <p><strong>Date :</strong> {{ $cours->date_heure }}</p>
    <p><strong>Description :</strong> {{ $cours->description }}</p>

    <div class="confirm-buttons">
        <form method="POST" action="{{ route('cours.reserver', $cours->id_cours) }}">
            @csrf
            <button type="submit">Confirmer la réservation</button>
    @if(session('error'))
        <div class="alert alert-danger" style="color: red; font-weight: bold; margin-bottom: 1em;">
            {{ session('error') }}
        </div>
    @endif
        <a href="{{ route('cours.planning') }}">Annuler</a>
        </form>
    </div>
</div>
@endsection
