@extends('layouts.app')

@section('title', 'Cours')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/cours.css') }}">
@endsection

@section('content')
<main>

<section class="cours-liste" aria-labelledby="titre-cours">
  <h1 id="titre-cours" class="cours-liste-titre">Nos Cours</h1>

  <a href="{{ url('cours_ecriture') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Scénarisation.jpg') }}" alt="Illustration du cours de scénarisation">
    <p>Scénarisation</p>
  </a>
  <a href="{{ url('cours_realisation') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Réalisation.jpg') }}" alt="Illustration du cours de réalisation">
    <p>Réalisation</p>
  </a>
  <a href="{{ url('cours_montage') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Montage.jpg') }}" alt="Illustration du cours de montage">
    <p>Montage</p>
  </a>
  <a href="{{ url('cours_cinema') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Cinématographie.jpg') }}" alt="Illustration du cours de cinématographie">
    <p>Cinématographie</p>
  </a>
  <a href="{{ url('cours_production') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Production.jpg') }}" alt="Illustration du cours de production">
    <p>Production</p>
  </a>
</section>

  <section class="cours-infos" aria-labelledby="infos-cinema">
    <div class="cours-infos-image">
      <img src="{{ asset('images/imagescours/Imagecours.jpg') }}" alt="Vue d'ensemble des ateliers cinéma">
    </div>
    <div class="cours-infos-texte">
      <h2 id="infos-cinema">Plongez dans l'Art du Cinéma</h2>
      <p>Découvrez comment nos cours transforment votre passion en expertise grâce à des techniques et connaissances approfondies.</p>
      <ul>
        <li>
          <span><img src="{{ asset('images/icons/scenario.svg') }}" alt="" role="presentation"></span>
          <div><strong>Écriture de Scénario</strong><br> Apprenez à écrire des histoires captivantes qui inspirent.</div>
        </li>
        <li>
          <span><img src="{{ asset('images/icons/realisation.svg') }}" alt="" role="presentation"></span>
          <div><strong>Technique de Réalisation</strong><br> Dirigez vos équipes avec confiance et créativité.</div>
        </li>
        <li>
          <span><img src="{{ asset('images/icons/montage.svg') }}" alt="" role="presentation"></span>
          <div><strong>Montage vidéo</strong><br> Montez des œuvres visuelles percutantes.</div>
        </li>
        <li>
          <span><img src="{{ asset('images/icons/cinema.svg') }}" alt="" role="presentation"></span>
          <div><strong>Cinématographie</strong><br> Jouez sur la lumière, le cadrage et le rythme.</div>
        </li>
        <li>
          <span><img src="{{ asset('images/icons/production.svg') }}" alt="" role="presentation"></span>
          <div><strong>Production</strong><br> Maîtrisez les aspects logistiques et financiers.</div>
        </li>
      </ul>
    </div>
  </section>

  <section class="cours-tarifs" aria-labelledby="titre-tarifs">
    <div class="cours-gauche">
      <h2 id="titre-tarifs">Horaires et Tarifs des Cours</h2>
      <h3>Un Accès Simplifié Grâce au Soutien de la Mairie</h3>
      <p>Tarifs Réduits : Grâce à la mairie, les ateliers sont accessibles à tous.</p>
      <p>Des Ateliers pour Tous : Sessions pour enfants, adolescents, adultes et seniors.</p>
      <p>Lieux et Horaires : Espaces municipaux, en semaine et le week-end.</p>

      <h3>Tarifs Proposés</h3>
      <ul>
        <li>Familles nombreuses (-10%) à partir de 2 inscriptions.</li>
        <li>Étudiants et demandeurs d’emploi (-15%) sur justificatif.</li>
        <li>Paiement en 3 fois sans frais pour les forfaits annuels.</li><br>
      </ul>

      <div class="cours-note">Inscriptions au service culturel de la mairie de Plessis-Trévise.</div>
    </div>

    <div class="cours-droite">
      <table>
        <thead>
          <tr>
            <th scope="col">Catégorie</th>
            <th scope="col">Tarif Résident</th>
            <th scope="col">Tarif Non-Résident</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Forfait Trimestriel (10 séances)</td><td>50€</td><td>70€</td></tr>
          <tr><td>Forfait Annuel (30 séances)</td><td>130€</td><td>180€</td></tr>
          <tr><td>Séance Ponctuelle (2h)</td><td>15€</td><td>20€</td></tr>
          <tr><td>Stage Intensif (5 jours)</td><td>80€</td><td>110€</td></tr>
        </tbody>
      </table>
    </div>
  </section>
</main>
@endsection
