@extends('layouts.app')

@section('content')
    <h1>✅ Résultat du quiz</h1>

    <p><strong>Cours :</strong> {{ $cours->titre }}</p>
    <p><strong>Score :</strong> {{ $score }} %</p>

    <hr>

    @foreach ($results as $result)
        <div>
            <p><strong>Question :</strong> {{ $result['question'] }}</p>
            <p><strong>Votre réponse :</strong> {{ $result['user_answer'] }}</p>
            <p><strong>Bonne réponse :</strong> {{ $result['correct_answer'] }}</p>

            @if ($result['is_correct'])
                <p style="color: green;">✔️ Bonne réponse</p>
            @else
                <p style="color: red;">❌ Mauvaise réponse</p>
            @endif
        </div>
        <hr>
    @endforeach

    <a href="{{ route('quiz.index') }}">⬅️ Retour à la liste des quiz</a>
@endsection
