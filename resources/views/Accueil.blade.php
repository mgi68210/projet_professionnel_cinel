@extends('layouts.app')

@section('title', 'Accueil - Cinel')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
@endsection

@section('content')
    <!-- HERO -->
    <section class="cam">
        <div class="cam-image">
            <img src="{{ asset('images/imagesaccueil/first.jpg') }}" alt="Studio cinéma" />
        </div>
        <div class="cam-text">
            <h1>PLONGEZ<br> DANS<br> L’UNIVERS<br> DU CINÉMA</h1>
            <a href="{{ route('concept') }}" class="cam-button">
                En savoir plus <span>→</span>
            </a>
            <p>Rejoignez nos cours et transformez votre passion pour le cinéma en une expertise reconnue.</p>
        </div>
    </section>

    <!-- SECTION Comment ça marche -->
    <section class="marche">
        <div class="marche-header">
            <div class="marche-text">
                <h2>Comment ça marche ?</h2>
                <p>Suivez ces étapes simples pour commencer votre aventure cinématographique.</p>
            </div>
            <div class="marche-image">
                <img src="{{ asset('images/imagesaccueil/commentçamarche.jpg') }}" alt="Illustration comment ça marche" />
            </div>
        </div>
        <div class="marche-list">
            <div class="etape">
                <div class="number">1</div>
                <h3>Inscrivez-vous au cours</h3>
                <p>Choisissez parmi une variété de cours adaptés à votre niveau et vos intérêts.</p>
            </div>
            <div class="etape">
                <div class="number">2</div>
                <h3>Participez activement</h3>
                <p>Engagez-vous dans des projets pratiques et développez vos compétences.</p>
            </div>
            <div class="etape">
                <div class="number">3</div>
                <h3>Partagez l’expérience</h3>
                <p>Remplissez le formulaire de satisfaction qui nous permettra de nous améliorer.</p>
            </div>
        </div>
    </section>

    <!-- SECTION Où nous trouver -->
    <section class="localisation">
        <div class="localisation-container">
            <div class="localisation-image">
                <img src="{{ asset('images/imagesaccueil/où.jpg') }}" alt="Carte de notre emplacement" />
            </div>
            <div class="localisation-info">
                <h2>Où nous trouver ?</h2>
                <p>94420 Le Plessis-Trévise</p>
            </div>
        </div>
    </section>
@endsection
