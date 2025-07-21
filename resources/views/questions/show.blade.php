@extends('layouts.app')

@section('content')
    <h1>Quiz du cours : {{ $cours->titre }}</h1>

    <form method="POST" action="{{ route('quiz.submit', $cours->id_cours) }}">
        @csrf

        @foreach($questions as $question)
            <div style="margin-bottom: 20px;">
                <p><strong>{{ $question->texte_question }}</strong></p>
                <input type="text" name="question_{{ $question->id_question }}" required>
            </div>
        @endforeach

        <button type="submit">Valider mes réponses</button>
    </form>
@endsection
