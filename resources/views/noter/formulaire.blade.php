@extends('layouts.app')

@section('content')

<h1>Donner votre avis sur un cours</h1>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

@if($coursANoter->count())

<form method="POST" action="{{ route('noter.envoyer') }}">
    @csrf

    <label for="id_cours">Cours :</label>
    <select name="id_cours" id="id_cours" required>
        <option value="">-- Choisir un cours --</option>
        @foreach($coursANoter as $cours)
            <option value="{{ $cours->id_cours }}">
                {{ $cours->titre }} ({{ \Carbon\Carbon::parse($cours->date_heure)->format('d/m/Y H:i') }})
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Note (1 à 5) :</label>
    <select name="note" required>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    
    <br><br>

    <label for="commentaire">Commentaire :</label><br>
    <textarea name="commentaire" id="commentaire" rows="4" cols="40"></textarea>

    <br><br>

    <button type="submit">Envoyer</button>
</form>

@else
    <p>Vous avez déjà noté tous les cours réservés, ou vous n’en avez pas réservé.</p>
@endif

@endsection
