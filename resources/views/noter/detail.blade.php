@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noter/detail.css') }}">
@endsection

@section('content')

<div class="avis-container">
    <h2>Détail de l’avis</h2>

    <p><strong>Utilisateur :</strong> {{ $utilisateur->prenom }} {{ $utilisateur->nom }}</p>
    <p><strong>Cours :</strong> {{ $cours->titre }}</p>
    <p><strong>Note :</strong> {{ $note->note_satisfaction }}/5</p>
    <p><strong>Commentaire :</strong> {{ $note->commentaire }}</p>
    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($note->date_remplissage)->format('d/m/Y H:i') }}</p>

    <a href="{{ route('noter.modifier', $cours->id_cours) }}">
        <button>Modifier</button>
    </a>

    <form action="{{ route('noter.supprimer', $cours->id_cours) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Supprimer cet avis ?')">Supprimer</button>
    </form>

    <br><br>
    <a href="{{ url()->previous() }}">
        <button>Retour</button>
    </a>
</div>

@endsection
