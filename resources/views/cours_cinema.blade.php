@extends('layouts.app')

@section('title', 'Cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours_cinema.css') }}">
@endsection

@section('content')
<body>
  <section class="cours-header">
    <h1>Cours de Cinématographie</h1>
  </section>

  <!-- SECTION 1 : Texte à gauche, image à droite -->
  <div class="container image-droite">
    <div class="texte-cote">
      <h2>Objectif du cours</h2>
      <p>Ce cours explore l’art de l’image au cinéma : cadrage, lumière, composition et mouvements de caméra.</p><br>
      <br>
      <h2>Déroulement des séances</h2>
      <ul>
        <li>Introduction aux bases techniques</li><br>
        <li>Pratique avec caméra et éclairage</li><br>
        <li>Analyse de scènes célèbres</li><br>
        <li>Réalisation de courts exercices filmés</li><br>
      </ul>
      <br>
      <h2>Matériel et Prérequis</h2>
      <p>Aucun prérequis n’est nécessaire. Le matériel est fourni.</p>
    </div>
    <div class="image-cote">
      <img src="images/imagescinema/cine2.png" alt="cinéma">
    </div>
  </div>

  <!-- SECTION 2 : Image à gauche, texte à droite -->
  <div class="container image-gauche">
    <div class="image-cote">
      <img src="images/imagescinema/cine1.png" alt="cinéma">
    </div>
    <div class="texte-cote">
      <h2>Tarifs et Inscription</h2>
      <p>Se référer à la grille tarifaire.</p>
    </div>
  </div>
</body>
</section>
@endsection
