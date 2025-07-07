<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Cours;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Je récupère tous les cours existants
        $Cours = Cours::all();

        // Je parcours chaque cours un par un
        foreach ($Cours as $coursActuel) {

            //  Si le titre du cours est "Scénarisation"
            if ($coursActuel->titre === 'Scénarisation') {
                DB::table('quiz')->insert([
                    [
                        'id_quiz' => Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Qu’est-ce qu’un protagoniste ?',
                        'texte_reponse' => 'Le personnage principal',
                        'id_cours' => $coursActuel->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'id_quiz' => Str::uuid(),
                        'type' => 'Libre',
                        'texte_question' => 'Écrivez une courte description de votre scénario préféré.',
                        'texte_reponse' => 'Réponse libre attendue',
                        'id_cours' => $coursActuel->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }

            //  Si le titre du cours est "Réalisation"
            if ($coursActuel->titre === 'Réalisation') {
                DB::table('quiz')->insert([
                    [
                        'id_quiz' => Str::uuid(),
                        'type' => 'Vrai/Faux',
                        'texte_question' => 'Un plan séquence est une scène tournée en une seule prise.',
                        'texte_reponse' => 'Vrai',
                        'id_cours' => $coursActuel->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'id_quiz' => Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Quel rôle joue le réalisateur sur un tournage ?',
                        'texte_reponse' => 'Il dirige la mise en scène',
                        'id_cours' => $coursActuel->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }

            //  Si le cours est "Montage Vidéo"
            if ($coursActuel->titre === 'Montage Vidéo') {
                DB::table('quiz')->insert([
                    [
                        'id_quiz' => Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Quel logiciel est souvent utilisé pour monter des vidéos ?',
                        'texte_reponse' => 'Adobe Premiere Pro',
                        'id_cours' => $coursActuel->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ]);
            }
        }
    }
}
