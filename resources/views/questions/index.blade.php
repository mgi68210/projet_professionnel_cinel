@extends('layouts.app')

@section('content')
<h1>Liste des questions</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Type</th>
        <th>Question</th>
        <th>Réponse</th>
        <th>Cours</th>
        <th>Actions</th>
    </tr>

    @foreach($questions as $question)
        <tr>
            <td>{{ $question->type }}</td>
            <td>{{ $question->texte_question }}</td>
            <td>{{ $question->texte_reponse }}</td>
            <td>{{ $question->cours->titre ?? 'Non lié' }}</td>
            <td>
                <a href="{{ route('questions.show', $question->id_question) }}">👁️</a>
                <a href="{{ route('questions.edit', $question->id_question) }}">✏️</a>
                <form action="{{ route('questions.destroy', $question->id_question) }}" method="POST" style="display:inline;">
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
