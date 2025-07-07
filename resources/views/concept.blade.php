@extends('layouts.app')

@section('title', 'Concept')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/concept.css') }}">
@endsection

@section('content')

    <!-- SECTION image principale avec flèches -->
    <section class="images-section">
        <div class="main-image">
            <button class="prev-btn"></button>
            <img id="img1" src="images/imagesconcept/1.jpeg">
            <button class="next-btn"></button>
        </div>
    </section>

    <!-- SECTION galerie d’images -->
    <div class="gallery">
    <img id="img1" src="images/imagesconcept/1.jpeg">
    <img id="img2" src="images/imagesconcept/2.jpeg">
    <img id="img3" src="images/imagesconcept/3.jpeg">
    </div>

    <!-- SECTION texte en diagonale -->
    <section class="concept-list-diagonale">
        <div class="item">
            <h3>Un Espace Dédié aux Passionnés de Cinéma</h3>
            <p>Notre plateforme propose des ateliers immersifs pour apprendre les techniques du cinéma, de l'écriture au montage, en passant par la mise en scène. Tous niveaux acceptés.</p>
        </div>
        <div class="item">
            <h3>Un Accès Simplifié aux Cours</h3>
            <p>Avec notre calendrier interactif, réservez vos séances en quelques clics et suivez votre progression facilement.</p>
        </div>
        <div class="item">
            <h3>Apprenez, Testez, Progressez</h3>
            <p>Renforcez vos connaissances grâce à des quiz et mettez en pratique les notions apprises en temps réel.</p>
        </div>
        <div class="item">
            <h3>Une Expérience Sécurisée et Intuitive</h3>
            <p>Inscrivez-vous en toute sécurité et profitez d'une navigation fluide et protégée.</p>
        </div>
    </section>
    <!-- SECTION bannière finale -->
    <section class="banner">
        <p>Rejoignez-nous et explorez l’univers du cinéma autrement !</p>
    </section>
    <button id="click">ici</button>

@endsection

@section('scripts')
    <script src="{{ asset('js/concept.js') }}"></script>
@endsection
