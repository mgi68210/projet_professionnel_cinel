@extends('layouts.app')

@section('content')
    <h1>📝 Liste des cours avec quiz</h1>

    @if ($coursAvecQuiz->isEmpty())
        <p>Aucun quiz disponible pour l’instant.</p>
    @else
        <ul>
            @foreach ($coursAvecQuiz as $cours)
                <li>
                    {{ $cours->titre }} ({{ $cours->date_heure }}) —
                    <a href="{{ route('quiz.show', $cours->id_cours) }}">Faire le quiz</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
