@extends('layouts.app')

@section('content')

<h1>Laisser un avis sur un cours</h1>

<!-- Formulaire pour donner un avis -->
<form method="POST" action="{{ route('noter.submit') }}">
    @csrf 
     {{-- token (jeton) caché de sécurité CSRF (contre les attaques de formulaire) pour permettre au middleware de protection CSRF de valider la requête --}}

    <label>Cours :</label>
    <select name="id_cours" required>
        <option>-- Choisissez un cours --</option>

       
        @foreach($coursDisponibles as $cours)
            <option value="{{ $cours->id_cours }}">
                {{ $cours->titre }} ({{ $cours->date_heure }})
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


    <label>Commentaire :</label>
    <textarea name="commentaire"></textarea>

    <br><br>


    <button type="submit">Envoyer</button>
</form>

@endsection
