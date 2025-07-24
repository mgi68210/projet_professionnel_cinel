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

            if ($cours->titre === 'Scénarisation') {
                Question::create([
                    'id_question' => (string) Str::uuid(),
                    'type' => 'QCM',
                    'texte_question' => 'Qu’est-ce qu’un protagoniste ?',
                    'texte_reponse' => 'Le héros||Le personnage secondaire||Le personnage principal||Le figurant',
                    'id_cours' => $cours->id_cours,
                ]);

                Question::create([
                    'id_question' => (string) Str::uuid(),
                    'type' => 'QCM',
                    'texte_question' => 'Quel est l’objectif principal d’un scénario ?',
                    'texte_reponse' => 'Informer||Divertir||Structurer une histoire||Présenter un acteur',
                    'id_cours' => $cours->id_cours,
                ]);
            }

            if ($cours->titre === 'Réalisation') {
                Question::create([
                    'id_question' => (string) Str::uuid(),
                    'type' => 'Vrai/Faux',
                    'texte_question' => 'Un plan séquence est une scène tournée en une seule prise.',
                    'texte_reponse' => 'Vrai',
                    'id_cours' => $cours->id_cours,
                ]);
            }

            if ($cours->titre === 'Montage Vidéo') {
                Question::create([
                    'id_question' => (string) Str::uuid(),
                    'type' => 'Vrai/Faux',
                    'texte_question' => "Le champ contrechamp consiste à alterner deux plans montrant les interlocuteurs d'une même scène.",
                    'texte_reponse' => 'Vrai',
                    'id_cours' => $cours->id_cours,
                ]);
            }
        }
    }
}
