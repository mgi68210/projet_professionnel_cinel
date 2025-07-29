@extends('layouts.app')

@section('title', 'Modifier le cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
<div class="admin-dashboard">
    <h1>Modifier le cours</h1>

    <form method="POST" action="{{ route('admin.cours.update', $cours->id_cours) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre', $cours->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required>{{ old('description', $cours->description) }}</textarea>
        </div>
    
        <div class="form-group">
        <label for="capacite_max">Capacité maximale</label>
        <input type="number" name="capacite_max" id="capacite_max" required>
        </div>

        <div class="form-group">
        <label for="tranche_age">Tranche d'âge</label>
        <input type="text" name="tranche_age" id="tranche_age" value="{{ old('tranche_age', $cours->tranche_age) }}" required>
        </div>

        <div class="form-group">
            <label for="date_heure">Date et Heure</label>
            <input type="datetime-local" name="date_heure" id="date_heure"
                   value="{{ \Carbon\Carbon::parse($cours->date_heure)->format('Y-m-d\TH:i') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="{{ route('admin.index') }}" class="btn btn-danger">Annuler</a>
    </form>
</div>
@endsection
