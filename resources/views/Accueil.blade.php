@extends('layouts.app')

@section('title', 'Accueil - Cinel')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
@endsection

@section('content')
    <!-- HERO -->
    <section class="hero">
        <div class="hero-image">
            <img src="{{ asset('images/imagesaccueil/first.jpg') }}" alt="Studio cinéma" />
        </div>
        <div class="hero-text">
            <h1>PLONGEZ<br> DANS<br> L’UNIVERS<br> DU CINÉMA</h1>
            <a href="{{ route('concept') }}" class="hero-button">
                En savoir plus <span>→</span>
            </a>
            <p>Rejoignez nos cours et transformez votre passion pour le cinéma en une expertise reconnue.</p>
        </div>
    </section>

    <!-- SECTION Comment ça marche -->
    <section class="steps">
        <div class="steps-header">
            <div class="steps-text">
                <h2>Comment ça marche ?</h2>
                <p>Suivez ces étapes simples pour commencer votre aventure cinématographique.</p>
            </div>
            <div class="steps-image">
                <img src="{{ asset('images/imagesaccueil/commentçamarche.jpg') }}" alt="Illustration comment ça marche" />
            </div>
        </div>
        <div class="steps-list">
            <div class="step">
                <div class="number">1</div>
                <h3>Inscrivez-vous au cours</h3>
                <p>Choisissez parmi une variété de cours adaptés à votre niveau et vos intérêts.</p>
            </div>
            <div class="step">
                <div class="number">2</div>
                <h3>Participez activement</h3>
                <p>Engagez-vous dans des projets pratiques et développez vos compétences.</p>
            </div>
            <div class="step">
                <div class="number">3</div>
                <h3>Partagez l’expérience</h3>
                <p>Remplissez le formulaire de satisfaction qui nous permettra de nous améliorer.</p>
            </div>
        </div>
    </section>

    <!-- SECTION Où nous trouver -->
    <section class="location">
        <div class="location-container">
            <div class="location-image">
                <img src="{{ asset('images/imagesaccueil/où.jpg') }}" alt="Carte de notre emplacement" />
            </div>
            <div class="location-info">
                <h2>Où nous trouver ?</h2>
                <p>94420 Le Plessis-Trévise</p>
            </div>
        </div>
    </section>
@endsection
