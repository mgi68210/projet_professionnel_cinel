@extends('layouts.app') 

@section('title', 'Cours de Réalisation') 

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours_realisation.css') }}">
@endsection

@section('content')
    <section class="cours-header">
        <h1>Cours de Réalisation</h1>
        <img src="{{ asset('images/imagesrealisation/real.png') }}" alt="Illustration real">
    </section>

    <section class="intro-objectif">
        <h2>Objectif du cours</h2>
        <p>
            Approfondissez les compétences de mise en scène :
            direction d'acteurs, préparation de tournage,
            organisation d'une équipe technique.
        </p>
    </section>

    <div class="container">
        <div class="texte-cote">
            <h2>Déroulement des séances</h2>
            <ul><br>
                <li>Préparation d'un projet de court-métrage</li><br>
                <li>Direction des acteurs</li><br>
                <li>Organisation du tournage</li><br>
                <li>Tournage et supervision technique</li><br>
            </ul>
            <br>
            <h2>Matériel et Prérequis</h2><br>
            <p>Carnet de notes et stylo recommandés.</p><br>
            <br>
            <h2>Tarifs et Inscription</h2><br>
            <p>Se référer à la grille tarifaire.</p><br>
        </div>
            <br>

        <div class="image-cote">
            <img src="{{ asset('images/imagesrealisation/real2.png') }}" alt="real">
        </div>
    </div>
@endsection
