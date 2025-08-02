@extends('layouts.app')

@section('title', 'Gestion des cours')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/cours/index.css') }}">
@endsection

@section('content')
<div class="admin-dashboard">
    <h1>Gestion des cours</h1>

    {{-- Bouton Ajouter --}}
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="{{ route('admin.cours.create') }}" class="btn btn-success">Ajouter un cours</a>
    </div>

    <div class="cours-block">
        {{-- Tableau des cours --}}
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date & Heure</th>
                    <th>Tranche d’âge</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cours as $c)
                    <tr>
                        <td>{{ $c->titre }}</td>
                        <td>{{ \Carbon\Carbon::parse($c->date_heure)->format('d/m/Y H:i') }}</td>
                        <td>{{ $c->tranche_age ?? 'Non défini' }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.cours.edit', $c->id_cours) }}" class="btn btn-primary">Modifier</a>

                            <form action="{{ route('admin.cours.destroy', $c->id_cours) }}" method="POST" style="display:inline"
                                onsubmit="return confirm('Supprimer ce cours ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">Aucun cours enregistré.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection