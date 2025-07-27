@extends('layouts.app')

@section('title', 'Liste des cours')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/cours/index.css') }}">
@endsection

@section('content')
<div class="cours-index-container">
    <h1>Liste des cours disponibles</h1>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @foreach ($cours as $item)
        <div class="cours-card">
            <h2>{{ $item->titre }}</h2>
            <p>{{ $item->description }}</p>
            <p><strong>Tranche d’âge :</strong> {{ $item->tranche_age }}</p>
            <p><strong>Capacité max :</strong> {{ $item->capacite_max }}</p>
            <p><strong>Date :</strong> {{ $item->date_heure }}</p>

            @auth
                @php
                    $dejaReserve = Auth::user()->cours->contains($item->id_cours);
                @endphp

                @if (!$dejaReserve)
                    <form method="POST" action="{{ route('cours.reserver', $item->id_cours) }}">
                        @csrf
                        <button type="submit" class="btn-reserver">Réserver</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('cours.annuler', $item->id_cours) }}" style="margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-annuler">Annuler la réservation</button>
                    </form>
                @endif
            @endauth
        </div>
    @endforeach
</div>
@endsection
