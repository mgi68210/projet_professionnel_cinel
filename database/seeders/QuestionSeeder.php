<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Cours;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $coursList = Cours::all();

        foreach ($coursList as $cours) {
            switch ($cours->titre) {
                case 'Scénarisation':
                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Qu’est-ce qu’un protagoniste ?',
                        'texte_reponse' => '**Le personnage principal||Le héros||Le figurant||Le personnage secondaire',
                        'id_cours' => $cours->id_cours,
                    ]);

                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Quel est le but d’un scénario ?',
                        'texte_reponse' => '**Raconter une histoire||Présenter un acteur||Faire un décor||Organiser un tournage',
                        'id_cours' => $cours->id_cours,
                    ]);
                    break;

                case 'Réalisation':
                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Un plan séquence est une scène tournée en une seule prise.',
                        'texte_reponse' => '**Vrai||Faux',
                        'id_cours' => $cours->id_cours,
                    ]);

                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Quel rôle a le réalisateur ?',
                        'texte_reponse' => '**Diriger le tournage||Monter les vidéos||Écrire la musique||Jouer un rôle',
                        'id_cours' => $cours->id_cours,
                    ]);
                    break;

                case 'Montage Vidéo':
                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => "Le champ contrechamp consiste à alterner deux plans montrant les interlocuteurs d'une même scène.",
                        'texte_reponse' => '**Vrai||Faux',
                        'id_cours' => $cours->id_cours,
                    ]);

                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => "Quel logiciel est souvent utilisé pour le montage ?",
                        'texte_reponse' => '**Adobe Premiere||Microsoft Word||Photoshop||Audacity',
                        'id_cours' => $cours->id_cours,
                    ]);
                    break;

                case 'Cinématographie':
                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => "Qu’est-ce que la profondeur de champ ?",
                        'texte_reponse' => '**Zone nette dans une image||Distance entre acteurs||Longueur du scénario||Taille du plateau',
                        'id_cours' => $cours->id_cours,
                    ]);

                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => "Quel rôle joue l’éclairage dans un plan ?",
                        'texte_reponse' => '**Créer une ambiance||Changer le son||Déterminer le lieu||Écrire un dialogue',
                        'id_cours' => $cours->id_cours,
                    ]);
                    break;

                case 'Production':
                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => "Que fait un producteur ?",
                        'texte_reponse' => '**Finance et organise le projet||Dirige les acteurs||Écrit les dialogues||Choisit les décors',
                        'id_cours' => $cours->id_cours,
                    ]);

                    Question::create([
                        'id_question' => (string) Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => "Quel est le premier document d’un projet de film ?",
                        'texte_reponse' => '**Le synopsis||La bande-annonce||Le générique||Le découpage technique',
                        'id_cours' => $cours->id_cours,
                    ]);
                    break;
            }
        }
    }
}
