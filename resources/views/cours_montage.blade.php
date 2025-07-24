@extends('layouts.app')

@section('title', 'Cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours_montage.css') }}">
@endsection

@section('content')
<body>
    <section class="cours-header">
    <h1>Cours de Montage</h1>
    </section>

<div class="container">
  <div class="image-cote">
    <img src="images/imagesmontage/Montage1.png" alt="Montage">
  </div>
  <div class="texte-cote">

    <h2>Objectif du cours</h2><br>
    <p>Maîtrisez l'art du montage : rythme, continuité, effets et narration. Apprenez à utiliser des logiciels professionnels comme Premiere Pro ou DaVinci Resolve.</p><br>
    <br>
    <br>
    <h2>Déroulement des séances</h2><br>
    <ul><br>
      <li>Initiation aux bases du montage</li><br>
      <li>Organisation et sélection des rushes</li><br>
      <li>Montage d’une scène simple</li><br>
      <li>Introduction aux effets et étalonnage</li><br>
    </ul><br>

    <h2>Matériel et Prérequis</h2><br>
    <p>Un ordinateur avec un logiciel de montage installé est recommandé.</p><br>

  </div>
</div>


<div class="info-container">
  <section class="info">
    <h2>Tarifs et Inscription</h2>
    <p>Se référer à la grille tarifaire.</p>
  </section>
  <div class="image-info">
    <img src="images/imagesmontage/Montage2.png" alt="Montage">
  </div>
</div>

    </div>
  </div>
</body>
</section>
@endsection

