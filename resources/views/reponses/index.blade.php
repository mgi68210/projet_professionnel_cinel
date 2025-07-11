<h2>Mes réponses</h2>

<ul>
@foreach ($reponses as $reponse)
    <li>
        <strong>Question :</strong> {{ $reponse->question->texte_question }}<br>
        <strong>Votre réponse :</strong> {{ $reponse->reponse_choisie }}<br>
        <strong>Bonne réponse ?</strong> {{ $reponse->reponse_bonne_fausse ? 'Oui' : 'Non' }}
    </li>
@endforeach
</ul>
