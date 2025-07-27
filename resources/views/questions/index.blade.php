@extends('layouts.app')

@section('title', 'Quiz disponibles')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/questions/index.css') }}">
@endsection

@section('content')
    <div class="quiz-index">
        <h1>Quiz disponibles</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if($cours->isEmpty())
            <p class="no-quiz">Vous n'avez aucun cours avec des quiz pour l’instant.</p>
        @else
            <ul>
                @foreach($cours as $coursItem)
                    <li>
                        <strong>{{ $coursItem->titre }}</strong> —
                        <a href="{{ route('quiz.show', $coursItem->id_cours) }}">Accéder au quiz</a> —
                        <a href="{{ route('reponses.index') }}">Voir mes réponses</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
