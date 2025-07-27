@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noter/modifier.css') }}">
@endsection

@section('content')

<div class="avis-container">
    <h2>Modifier votre avis</h2>

    <form method="POST" action="{{ route('noter.MAJ', $cours->id_cours) }}">
        @csrf

        <p><strong>Cours :</strong> {{ $cours->titre }}</p>

        <label for="note">Note (1 à 5) :</label>
        <select name="note" id="note" required>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ $note->note_satisfaction == $i ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>

        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" rows="4">{{ $note->commentaire }}</textarea>

        <button type="submit">Modifier</button>
    </form>
</div>

@endsection
