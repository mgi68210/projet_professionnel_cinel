@extends('layouts.app')

@section('title', 'Quiz')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/questions/show.css') }}">
@endsection


@section('content')
<div class="quiz-page">
    <h1>Quiz du cours : {{ $cours->titre }}</h1>

    <form method="POST" action="{{ route('quiz.submit', $cours->id_cours) }}">
        @csrf

        @foreach($questions as $question)
            <div class="quiz-question">
                <p><strong>{{ $question->texte_question }}</strong></p>

                @if($question->type === 'QCM')
                    @php
                        $options = explode('||', $question->texte_reponse);
                    @endphp

                    @foreach($options as $option)
                        @php
                            $label = ltrim($option, '**');
                        @endphp
                        <label class="quiz-option">
                            <input type="radio" name="question_{{ $question->id_question }}" value="{{ $label }}" required>
                            {{ $label }}
                        </label>
                    @endforeach
                @else
                    <input type="text" name="question_{{ $question->id_question }}" class="quiz-input" required>
                @endif
            </div>
        @endforeach

        <button type="submit" class="quiz-button">Valider mes réponses</button>
    </form>
</div>
@endsection
