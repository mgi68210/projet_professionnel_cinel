@extends('layouts.app')

@section('title', 'Cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours_ecriture.css') }}">
@endsection

@section('content')
<body>

  <section class="cours-header">
    <h1>Cours d'Écriture de Scénario</h1><br>
    <img src="images/imagesecriture/scénario.png" alt="Illustration scénario">
  </section>

  <section class="intro-objectif">
    <h2>Objectif du cours</h2>
    <p>Découvrez les bases de l'écriture de scénario : structure narrative, développement des personnages et dialogues.</p>
  </section>

  <div class="container">
    <div class="image-side">
      <img src="images/imagesecriture/scénario2.png" alt="Scénario 2">
    </div>
    <div class="text-side">
      <h2>Déroulement des séances</h2>
      <ul><br>
      <br>
        <li>Comprendre la structure en trois actes</li><br>
        <li>Création de personnages cohérents</li><br>
        <li>Techniques d'écriture et dialogues</li><br>
        <li>Analyse de scénarios de films</li><br>
      </ul><br>
      <br>
      <h2>Matériel et Prérequis</h2><br>
      <br>
      <p>Carnet de notes et stylo recommandés.</p><br>
      <br>
      <h2>Tarifs et Inscription</h2><br>
      <br>
      <p>Se référer à la grille tarifaire.</p><br>
    </div>
  </div>
</body>
</section>
@endsection
