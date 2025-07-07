@extends('layouts.app')

@section('content')
    <h1>🧠 Quiz</h1>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('quiz.submit') }}">
        @csrf

        <label for="id_cours">Choisis ton cours :</label>
        <select name="id_cours" required onchange="this.form.submit()">
            <option value="">-- Sélectionner un cours --</option>
            @foreach ($coursDisponibles as $cours)
                <option value="{{ $cours->id_cours }}" {{ old('id_cours') == $cours->id_cours ? 'selected' : '' }}>
                    {{ $cours->titre }} ({{ $cours->date_heure }})
                </option>
            @endforeach
        </select>
    </form>

    @if (old('id_cours'))
        <hr>
        <form method="POST" action="{{ route('quiz.submit') }}">
            @csrf
            <input type="hidden" name="id_cours" value="{{ old('id_cours') }}">

            @php
                $questions = \App\Models\Quiz::where('id_cours', old('id_cours'))->get();
            @endphp

            @foreach ($questions as $index => $quiz)
                <div style="margin-bottom: 1rem;">
                    <strong>Question {{ $index + 1 }} :</strong> {{ $quiz->texte_question }}

                    @if ($quiz->type === 'QCM')
                        <br>
                        <label><input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="{{ $quiz->texte_reponse }}"> {{ $quiz->texte_reponse }}</label>
                        <label><input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="Autre"> Autre</label>
                    @elseif ($quiz->type === 'Vrai/Faux')
                        <br>
                        <label><input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="Vrai"> Vrai</label>
                        <label><input type="radio" name="reponse_{{ $quiz->id_quiz }}" value="Faux"> Faux</label>
                    @else
                        <br>
                        <input type="text" name="reponse_{{ $quiz->id_quiz }}" placeholder="Ta réponse">
                    @endif
                </div>
            @endforeach

            <button type="submit">Soumettre mes réponses</button>
        </form>
    @endif
@endsection
