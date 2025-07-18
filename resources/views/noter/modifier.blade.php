@extends('layouts.app')

@section('content')

<h2>Modifier votre avis</h2>

<form method="POST" action="{{ route('noter.MAJ', $cours->id_cours) }}">
    @csrf

    <p><strong>Cours :</strong> {{ $cours->titre }}</p>

    <label>Note (1 à 5) :</label>
    <select name="note" required>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>

    <br><br>

    <label>Commentaire :</label><br>
    <textarea name="commentaire" rows="4" cols="40">{{ $note->commentaire }}</textarea>

    <br><br>

    <button type="submit">Modifier</button>
</form>

@endsection
