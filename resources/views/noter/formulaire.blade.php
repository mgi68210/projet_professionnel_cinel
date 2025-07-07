@extends('layouts.app') 
{{-- Ma "mise en page" de base (layout) --}}

@section('content') 
{{-- la section "content" que le layout va afficher au bon endroit --}}

    <h1>Laisser un avis sur un cours</h1> 

    <form method="POST" action="{{ route('noter.submit') }}">
        @csrf 
        {{-- Cette ligne ajoute un token caché de sécurité CSRF (contre les attaques de formulaire). Laravel oblige. --}}

        {{-- ------------ Sélection du cours ------------ --}}
        <label for="id_cours">Cours :</label>
        <select name="id_cours" required>
            <option value="">-- Choisissez un cours --</option>
            {{-- On affiche ici tous les cours disponibles, un par un --}}
            @foreach($coursDisponibles as $cours)
                <option value="{{ $cours->id_cours }}">
                    {{ $cours->titre }} ({{ $cours->date_heure }}) 

                </option>
            @endforeach
        </select>

        <br><br>

        <label for="note">Note (1 à 5) :</label>
        <select name="note" required>
            @for($i = 1; $i <= 5; $i++)
            <!-- C’est une boucle for qui commence à 1 et s’arrête à 5. -->
                <option value="{{ $i }}">{{ $i }}</option>
                {{-- Affiche les options : 1, 2, 3, 4, 5 --}}
            @endfor
        </select>

        <br><br>

        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" rows="4" cols="50"></textarea>
        {{-- L’utilisateur peut écrire ce qu’il pense du cours --}}

        <br><br>

        <button type="submit">Envoyer</button>
    </form>

@endsection 
