@extends('layouts.app')

@section('content')
<h1>Quiz disponibles</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if($cours->isEmpty())
    <p>Vous n'avez aucun cours avec des quiz pour l’instant.</p>
@else
    <ul>
        @foreach($cours as $coursItem)
            <li>
                {{ $coursItem->titre }} — 
                <a href="{{ route('quiz.show', $coursItem->id_cours) }}">Voir les questions</a>
            </li>
        @endforeach
    </ul>
@endif

@endsection
