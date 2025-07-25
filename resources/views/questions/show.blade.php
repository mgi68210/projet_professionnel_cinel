@extends('layouts.app')

@section('content')
    <h1>Quiz du cours : {{ $cours->titre }}</h1>

    <form method="POST" action="{{ route('quiz.submit', $cours->id_cours) }}">
        @csrf

        @foreach($questions as $question)
            <div style="margin-bottom: 20px;">
                <p><strong>{{ $question->texte_question }}</strong></p>

                @if($question->type === 'QCM')
                    @php
                        $options = explode('||', $question->texte_reponse);
                    @endphp

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
