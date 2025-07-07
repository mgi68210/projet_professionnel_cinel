@extends('layouts.app')

@section('title', 'Cours')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cours.css') }}">
@endsection

@section('content')
<!-- SECTION PETITES IMAGES COURS -->
<section class="cours-list">
  <a href="{{ url('cours_ecriture') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Scénarisation.jpg') }}" alt="Scénarisation">
    <p>Scénarisation</p>
  </a>
  <a href="{{ url('cours_realisation') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Réalisation.jpg') }}" alt="Réalisation">
    <p>Réalisation</p>
  </a>
  <a href="{{ url('cours_montage') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Montage.jpg') }}" alt="Montage">
    <p>Montage</p>
  </a>
  <a href="{{ url('cours_cinema') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Cinématographie.jpg') }}" alt="Cinématographie">
    <p>Cinématographie</p>
  </a>
  <a href="{{ url('cours_production') }}" class="cours-item">
    <img src="{{ asset('images/imagescours/Production.jpg') }}" alt="Production">
    <p>Production</p>
  </a>
</section>

<!-- SECTION INFOS COURS -->
<section class="cours-infos">
  <div class="cours-infos-image">
    <img src="{{ asset('images/imagescours/Imagecours.jpg') }}" alt="Illustration cours">
  </div>
  <div class="cours-infos-text">
    <h2>Plongez dans l'Art du Cinéma</h2>
    <p>Découvrez comment nos cours transforment votre passion en expertise grâce à des techniques et connaissances approfondies.</p>
    <ul>
      <li><span>🖊️</span><div><strong>Écriture de Scénario</strong> Apprenez à écrire des histoires captivantes qui inspirent.</div></li>
      <li><span>🎥</span><div><strong>Techniques de Réalisation</strong> Dirigez vos équipes avec confiance et créativité.</div></li>
      <li><span>🎞️</span><div><strong>Montage Vidéo</strong> Montez des œuvres visuelles percutantes.</div></li>
      <li><span>🎬</span><div><strong>Cinématographie</strong> Jouez sur la lumière, le cadrage et le rythme.</div></li>
      <li><span>📊</span><div><strong>Production</strong> Maîtrisez les aspects logistiques et financiers.</div></li>
    </ul>
  </div>
</section>

<!-- SECTION TARIFS -->
<section class="cours-tarifs">
  <div class="cours-left">
    <h2>Horaires et Tarifs des Cours</h2>
    <h3>Un Accès Simplifié Grâce au Soutien de la Mairie</h3>
    <p>Tarifs Réduits : Grâce à la mairie, les ateliers sont accessibles à tous.</p>
    <p>Des Ateliers pour Tous : Sessions pour enfants, adolescents, adultes et seniors.</p>
    <p>Lieux et Horaires : Espaces municipaux, en semaine et le week-end.</p>

    <h3>Tarifs Proposés</h3>
    <ul>
      <li>Familles nombreuses (-10%) à partir de 2 inscriptions.</li>
      <li>Étudiants et demandeurs d’emploi (-15%) sur justificatif.</li>
      <li>Paiement en 3 fois sans frais pour les forfaits annuels.</li>
    </ul>

    <div class="cours-note"> Inscriptions au service culturel de la mairie de Plessis-Trévise.</div>
  </div>

  <div class="cours-right">
    <table>
      <thead>
        <tr>
          <th>Catégorie</th>
          <th>Tarif Résident</th>
          <th>Tarif Non-Résident</th>
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
@endsection
