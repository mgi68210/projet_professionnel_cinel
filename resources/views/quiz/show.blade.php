@extends('layouts.app')

@section('content')
    <h1>🎯 Quiz du cours : {{ $cours->titre }}</h1>

    @if ($quizList->isEmpty())
        <p>Il n’y a pas encore de questions pour ce cours.</p>
    @else
        <form method="POST" action="{{ route('quiz.submit', $cours->id_cours) }}">
            @csrf

            @foreach ($quizList as $index => $quiz)
                <div style="margin-bottom: 20px;">
                    <h3>Question {{ $index + 1 }} :</h3>
                    <p>{{ $quiz->texte_question }}</p>

                    @if ($quiz->type === 'QCM')
                        {{-- Question à choix multiples --}}
                        <label>
                            <input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="1"> {{ $quiz->texte_reponse }}
                        </label><br>
                        <label>
                            <input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="0"> Autre réponse
                        </label>

                    @elseif ($quiz->type === 'Vrai/Faux')
                        {{-- Vrai / Faux --}}
                        <label>
                            <input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="1"> Vrai
                        </label><br>
                        <label>
                            <input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="0"> Faux
                        </label>

                    @elseif ($quiz->type === 'Libre')
                        {{-- Réponse libre --}}
                        <input type="text" name="reponse_{{ $quiz->id_quiz }}" placeholder="Votre réponse">
                    @endif
                </div>
                <hr>
            @endforeach

            <button type="submit"> Envoyer mes réponses</button>
        </form>
    @endif
@endsection
