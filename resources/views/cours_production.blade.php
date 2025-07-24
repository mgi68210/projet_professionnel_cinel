@extends('layouts.app')

@section('title', 'Cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours_production.css') }}">
@endsection

@section('content')
<body>

  <section class="cours-header">
    <h1>Cours de Production</h1><br>
    <img src="images/imagesproduction/prod.png" alt="prod">
  </section>

  <section class="intro-objectif">
    <h2>Objectif du cours</h2>
    <p>Apprenez à organiser un tournage : budget, démarches administratives, planification et distribution.</p>
  </section>

  <div class="container">
    <div class="texte-cote">
      <h2>Déroulement des séances</h2>
      <ul><br>
      <br>
        <li>Préparation d'un plan de tournage</li><br>
        <li>Gestion du budget et recherche de financement</li><br>
        <li>Coordination des équipes</li><br>
        <li>Stratégies de diffusion et distribution</li><br>
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
        <div class="image-cote">
      <img src="images/imagesproduction/prod2.png" alt="prod2">
    </div>
  </div>
</body>
</section>
@endsection

