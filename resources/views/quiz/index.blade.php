@extends('layouts.app')

@section('content')
    <h1>Mes cours avec quiz</h1>

    @if($coursAvecQuiz->isEmpty())
        <p>Vous n'avez aucun cours avec un quiz pour le moment.</p>
    @else
        <ul>
            @foreach($coursAvecQuiz as $cours)
                <li>
                    <strong>{{ $cours->titre }}</strong> <br>
                    <a href="{{ route('quiz.show', $cours->id_cours) }}">Voir les questions</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
