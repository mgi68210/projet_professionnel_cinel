@extends('layouts.app')

@section('content')
    <h1>Quiz du cours : {{ $cours->titre }}</h1>

    <form method="POST" action="{{ route('quiz.submit', $cours->id_cours) }}">
        @csrf

        @foreach($questions as $question)
            <div style="margin-bottom: 20px;">
                <p><strong>{{ $question->texte_question }}</strong></p>

                @php
                    $options = explode('||', $question->texte_reponse);
                @endphp

                @if($question->type === 'QCM' && count($options) > 1)
                    @foreach($options as $option)
                        <div>
                            <label>
                                <input type="radio" name="question_{{ $question->id_question }}" value="{{ $option }}" required>
                                {{ $option }}
                            </label>
                        </div>
                    @endforeach
                @else
                    <input type="text" name="question_{{ $question->id_question }}" required>
                @endif
            </div>
        @endforeach

        <button type="submit">Valider mes réponses</button>
    </form>
@endsection
