@extends('layouts.app') 
{{-- Je dis à Laravel qu'on utilise la mise en page générale "layouts/app.blade.php" --}}

@section('content') 
{{-- Je commence la section "content" qui sera insérée dans le layout principal --}}

    <h2>Détail de l’avis</h2> 

    {{-- Affiche le prénom et nom de l'utilisateur qui a donné l'avis --}}
    <p><strong>Utilisateur :</strong> {{ $utilisateur->prenom }} {{ $utilisateur->nom }}</p>

    {{-- Affiche le nom du cours évalué --}}
    <p><strong>Cours :</strong> {{ $cours->titre }}</p>
    <!-- Dans cette ligne, j'affiche le titre du cours sélectionné. 
    La variable $cours contient un cours précis, et en écrivant {{ $cours->titre }}, 
    je demande à Laravel d'afficher le champ titre de ce cours. 
    C’est une donnée qu’on va chercher depuis la base de données dans la table cours. -->

    {{-- Affiche la note donnée par l'utilisateur (sur 5) --}}
    <p><strong>Note :</strong> {{ $note->note_satisfaction }}/5</p>

    {{-- Affiche le commentaire écrit par l'utilisateur --}}
    <p><strong>Commentaire :</strong> {{ $note->commentaire }}</p>

    {{-- Affiche la date de remplissage de l'avis, au bon format (ex : 30/06/2025 15:30) --}}
    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($note->date_remplissage)->format('d/m/Y H:i') }}</p>
     <!-- On utilise la librairie Carbon (spéciale pour les dates) pour transformer une date texte en vraie date utilisable. -->

    {{-- Lien pour revenir à la page précédente --}}
    <a href="{{ url()->previous() }}">⬅️ Retour</a>
@endsection 
{{-- Fin de la section "content" --}}
