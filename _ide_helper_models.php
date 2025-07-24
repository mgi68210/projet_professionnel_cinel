<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property string $id_admin
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $mot_de_passe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereIdAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereMotDePasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id_cours
 * @property string $titre
 * @property string|null $description
 * @property string|null $tranche_age
 * @property int|null $capacite_max
 * @property string|null $date_heure
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Noter> $noter
 * @property-read int|null $noter_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Utilisateur> $utilisateurs
 * @property-read int|null $utilisateurs_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereCapaciteMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereDateHeure($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereTrancheAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Cours extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id_utilisateur
 * @property string $id_cours
 * @property float $note_satisfaction
 * @property string|null $commentaire
 * @property string $date_remplissage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cours $cours
 * @property-read \App\Models\Utilisateur $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereDateRemplissage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereNoteSatisfaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Noter extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id_question
 * @property string $type
 * @property string $texte_question
 * @property string $texte_reponse
 * @property string $id_cours
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cours $cours
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reponse> $reponses
 * @property-read int|null $reponses_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereIdQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereTexteQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereTexteReponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id_utilisateur
 * @property string $id_question
 * @property string $reponse_choisie
 * @property int $reponse_bonne_fausse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Question $question
 * @property-read \App\Models\Utilisateur $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereIdQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereReponseBonneFausse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereReponseChoisie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Reponse extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id_utilisateur
 * @property string $id_cours
 * @property string $date_reservation
 * @property string|null $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cours $cours
 * @property-read \App\Models\Utilisateur $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereDateReservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Reserver extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User_old extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id_utilisateur
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $mot_de_passe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cours> $cours
 * @property-read int|null $cours_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Noter> $noter
 * @property-read int|null $noter_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reponse> $reponses
 * @property-read int|null $reponses_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereMotDePasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereUpdatedAt($value)
 */
	class Utilisateur extends \Eloquent {}
}

