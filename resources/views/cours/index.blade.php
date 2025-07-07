```blade
@extends('layouts.app')

@section('content')
<h1>Liste des cours disponibles</h1>

<!-- Affiche un message de succès s'il y a -->
@if (session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif

<!-- Affiche un message d'erreur s'il y a -->
@if (session('error'))
    <div style="color: red">{{ session('error') }}</div>
@endif

@foreach ($cours as $item)
    <div style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1rem;">
        <h2>{{ $item->titre }}</h2>
        <p>{{ $item->description }}</p>
        <p><strong>Tranche d’âge :</strong> {{ $item->tranche_age }}</p>
        <p><strong>Capacité max :</strong> {{ $item->capacite_max }}</p>
        <p><strong>Date :</strong> {{ $item->date_heure }}</p>

        @auth
        <form method="POST" action="{{ route('cours.reserver', $item->id_cours) }}">
            @csrf
            <button type="submit">Réserver</button>
        </form>
        @endauth
    </div>
@endforeach
@endsection
```
