@extends('layouts.app')

@section('content')
<h1>Mes réponses</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Question</th>
        <th>Votre réponse</th>
        <th>Bonne ou fausse</th>
    </tr>

    @foreach($reponses as $reponse)
        <tr>
            <td>{{ $reponse->question->texte_question ?? 'Question supprimée' }}</td>
            <td>{{ $reponse->reponse_choisie }}</td>
            <td>
                {{ $reponse->reponse_bonne_fausse ? 'Bonne' : ' Fausse' }}
            </td>
        </tr>
    @endforeach
</table>
@endsection
