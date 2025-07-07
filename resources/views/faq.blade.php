<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>FAQ - CINEL</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f1e8; /* Sépia clair */
      color: #2c2c2c;
      font-family: Arial, sans-serif;
    }
    h1, h2 {
      color: #4a3c2c; /* Brun foncé */
    }
    .accordion-button {
      background-color: #e7dfcf; /* Sépia moyen */
      color: #2c2c2c;
    }
    .accordion-button:not(.collapsed) {
      background-color: #d2c7b5;
      color: #2c2c2c;
    }
    .btn-primary {
      background-color: #4a3c2c;
      border: none;
    }
    .btn-primary:hover {
      background-color: #665744;
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <h1 class="mb-4 text-center">Foire aux questions (FAQ)</h1>
    <p class="text-center mb-5">Tout ce que vous devez savoir sur le fonctionnement des ateliers CINEL au Plessis-Trévise.</p>

    <div class="accordion" id="faqAccordion">

      <!-- Q1 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1">
            Comment créer mon compte et m’inscrire aux cours ?
          </button>
        </h2>
        <div id="answer1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Cliquez sur « Inscription » dans le menu principal. Complétez le formulaire sécurisé (nom, prénom, e-mail, mot de passe). Validez votre inscription grâce au lien reçu par e-mail. Vous aurez alors accès à votre tableau de bord personnel.
          </div>
        </div>
      </div>

      <!-- Q2 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2">
            Comment réserver un créneau sur le planning ?
          </button>
        </h2>
        <div id="answer2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Connectez-vous à votre tableau de bord, accédez à la page « Planning », filtrez les cours par date ou par tranche d’âge (adolescents, jeunes adultes, adultes, seniors) et cliquez sur le créneau vert disponible. La confirmation sera instantanée et visible dans votre espace personnel.
          </div>
        </div>
      </div>

      <!-- Q3 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3">
            Dois-je avoir des prérequis pour participer aux ateliers ?
          </button>
        </h2>
        <div id="answer3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Aucun prérequis pour les ateliers découverte. Pour les cours de perfectionnement, le niveau et le matériel nécessaire sont précisés sur la page « Cours ».
          </div>
        </div>
      </div>

      <!-- Q4 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4">
            Comment fonctionne le quiz après un atelier ?
          </button>
        </h2>
        <div id="answer4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            À la fin de votre atelier, accédez à votre tableau de bord : un quiz interactif sera disponible. Il propose des QCM, des vrai/faux ou des questions ouvertes. Le résultat est affiché instantanément et sauvegardé dans votre profil pour suivre votre progression.
          </div>
        </div>
      </div>

      <!-- Q5 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer5">
            Comment donner mon avis sur un cours ?
          </button>
        </h2>
        <div id="answer5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Rendez-vous sur la page « Formulaire », accessible depuis votre tableau de bord après avoir suivi un cours. Vous pouvez alors évaluer le contenu (1 à 5 étoiles), commenter la pédagogie et proposer des suggestions d’amélioration.
          </div>
        </div>
      </div>

      <!-- Q6 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q6">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer6">
            Qui peut accéder aux ateliers et quelles sont les tranches d’âge ?
          </button>
        </h2>
        <div id="answer6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Les ateliers CINEL sont réservés aux habitants du Plessis-Trévise titulaires d’un abonnement annuel aux services culturels. Ils sont organisés par tranche d’âge : adolescents (11–17 ans), jeunes adultes (18–25 ans), adultes (26–59 ans) et seniors (60 ans et +), pour adapter le contenu aux besoins de chacun.
          </div>
        </div>
      </div>

      <!-- Q7 -->
      <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="q7">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer7">
            Comment contacter le formateur ?
          </button>
        </h2>
        <div id="answer7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Connectez-vous à votre compte et utilisez le formulaire de contact dans le menu. Votre message sera enregistré dans le back-office du formateur, qui vous répondra par e-mail dans les meilleurs délais. Un statut « lu / non lu » est mis à jour automatiquement.
          </div>
        </div>
      </div>

    </div>

    <a href="Accueil.php" class="btn btn-primary mt-4">Retour au site</a>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
