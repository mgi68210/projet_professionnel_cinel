@extends('layouts.app')

@section('title', 'Ajouter un cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
<div class="admin-dashboard">
    <h1>Ajouter un nouveau cours</h1>

    <form method="POST" action="{{ route('admin.cours.store') }}">
        @csrf

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
        <label for="tranche_age">Tranche d'âge</label>
        <input type="text" name="tranche_age" id="tranche_age" placeholder="ex: 12-15 ans" required>
        </div>

        <div class="form-group">
            <label for="date_heure">Date et Heure</label>
            <input type="datetime-local" name="date_heure" id="date_heure" required>
        </div>

        <div class="form-group">
            <label for="capacite_max">Capacité maximale</label>
            <input type="number" name="capacite_max" id="capacite_max" required>
        </div>

        <button type="submit" class="btn btn-success">Créer le cours</button>
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Annuler</a>
    </form>
</div>
@endsection
