@extends('layouts.app')

@section('content')
    <h1> Tous les messages reçus</h1>

    @if($messages->isEmpty())
        <p>Aucun message pour le moment.</p>
    @else
        @foreach ($messages as $message)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <p><strong> De :</strong> {{ $message->utilisateur->prenom ?? 'Inconnu' }}</p>
                <p><strong> Objet :</strong> {{ $message->objet }}</p>
                <p><strong> Message :</strong> {{ $message->contenu }}</p>
                <p><strong>Envoyé le :</strong> {{ \Carbon\Carbon::parse($message->date_envoi)->format('d/m/Y H:i') }}</p>
                <p><strong>Statut :</strong> {{ $message->statut }}</p>
            </div>
        @endforeach
    @endif
@endsection
