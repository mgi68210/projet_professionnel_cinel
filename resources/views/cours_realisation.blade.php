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
        <div class="text-side">
            <h2>Déroulement des séances</h2>
            <ul>
                <li>Préparation d'un projet de court-métrage</li>
                <li>Direction des acteurs</li>
                <li>Organisation du tournage</li>
                <li>Tournage et supervision technique</li>
            </ul>

            <h2>Matériel et Prérequis</h2>
            <p>Carnet de notes et stylo recommandés.</p>

            <h2>Tarifs et Inscription</h2>
            <p>Se référer à la grille tarifaire.</p>
        </div>

        <div class="image-side">
            <img src="{{ asset('images/imagesrealisation/real2.png') }}" alt="real">
        </div>
    </div>
@endsection
