@extends('layouts.app')

@section('title', 'Modifier le cours')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/cours/create.css') }}">
@endsection

@section('content')
<div class="admin-form-container">
    <h1>Modifier le cours</h1>

    <form method="POST" action="{{ route('admin.cours.update', $cours->id_cours) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" value="{{ old('titre', $cours->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $cours->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_heure">Date et heure</label>
            <input type="datetime-local" id="date_heure" name="date_heure" 
            value="{{ old('date_heure', \Carbon\Carbon::parse($cours->date_heure)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="capacite_max">Capacité maximale</label>
            <input type="number" id="capacite_max" name="capacite_max" 
            value="{{ old('capacite_max', $cours->capacite_max) }}" required>
        </div>

        <div class="form-group">
            <label for="tranche_age">Tranche d'âge</label>
            <input type="text" id="tranche_age" name="tranche_age" 
            value="{{ old('tranche_age', $cours->tranche_age) }}">
        </div>

        <div class="form-bouttons">
            <a href="{{ route('admin.cours.index') }}" class="btn-retour">Retour</a>
            <button type="submit" class="btn-valider">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
