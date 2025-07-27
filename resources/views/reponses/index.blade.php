@extends('layouts.app')

@section('title', 'Mes réponses')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/reponses/index.css') }}">
@endsection

@section('content')
<div class="reponses-container">
    <h1>Mes réponses aux quiz</h1>

    @if($reponses->isEmpty())
        <p>Vous n'avez répondu à aucune question pour le moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Votre réponse</th>
                    <th>Résultat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reponses as $reponse)
                    <tr>
                        <td>{{ $reponse->question->texte_question }}</td>
                        <td>{{ $reponse->reponse_choisie }}</td>
                        <td class="{{ $reponse->reponse_bonne_fausse ? 'correct' : 'incorrect' }}">
                            {{ $reponse->reponse_bonne_fausse ? 'Juste' : 'Faux' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
