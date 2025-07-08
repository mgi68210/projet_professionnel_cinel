@extends('layouts.app') 

@section('content') 

    <h2>Détail de l’avis</h2> 

    <p><strong>Utilisateur :</strong> {{ $utilisateur->prenom }} {{ $utilisateur->nom }}</p>

    <p><strong>Cours :</strong> {{ $cours->titre }}</p>
    <!-- Dans cette ligne, j'affiche le titre du cours sélectionné. 
    La variable $cours contient un cours précis, et en écrivant {{ $cours->titre }}, 
    je demande à Laravel d'afficher le champ titre de ce cours. 
    C’est une donnée qu’on va chercher depuis la base de données dans la table cours. -->

    <p><strong>Note :</strong> {{ $note->note_satisfaction }}/5</p>

    <p><strong>Commentaire :</strong> {{ $note->commentaire }}</p>

    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($note->date_remplissage)->format('d/m/Y H:i') }}</p>
     <!-- J'utilise la librairie Carbon (spéciale pour les dates) pour transformer une date texte en vraie date utilisable. -->

    {{-- Lien pour revenir à la page précédente --}}
    <a href="{{ url()->previous() }}">⬅️ Retour</a>
@endsection 
