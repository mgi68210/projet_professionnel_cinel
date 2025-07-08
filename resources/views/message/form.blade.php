@extends('layouts.app')

@section('content')
    <h1> Écrire un message</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('message.submit') }}">
        @csrf {{-- Sécurité obligatoire car formulaire --}}

        <label for="objet">Objet :</label><br>
        <input type="text" name="objet" id="objet" required><br><br>

        <label for="contenu">Message :</label><br>
        <textarea name="contenu" id="contenu" rows="5" required></textarea><br><br>

        <button type="submit">Envoyer</button>
    </form>
@endsection
