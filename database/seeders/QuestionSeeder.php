<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Cours;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $coursList = Cours::all();

        foreach ($coursList as $cours) {
            if ($cours->titre === 'Scénarisation') {
                DB::table('questions')->insert([
                    [
                        'id_question' => Str::uuid(),
                        'type' => 'QCM',
                        'texte_question' => 'Qu’est-ce qu’un protagoniste ?',
                        'texte_reponse' => 'Le personnage principal',
                        'id_cours' => $cours->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }

            if ($cours->titre === 'Réalisation') {
                DB::table('questions')->insert([
                    [
                        'id_question' => Str::uuid(),
                        'type' => 'Vrai/Faux',
                        'texte_question' => 'Un plan séquence est une scène tournée en une seule prise.',
                        'texte_reponse' => 'Vrai',
                        'id_cours' => $cours->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }

            if ($cours->titre === 'Montage Vidéo') {
                DB::table('questions')->insert([
                    [
                        'id_question' => Str::uuid(),
                        'type' => 'Vrai/Faux',
                        'texte_question' => "Le champ contrechamp consiste à alterner deux plans montrant les interlocuteurs d'une même scène.",
                        'texte_reponse' => 'Vrai',
                        'id_cours' => $cours->id_cours,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }
        }
    }
}
