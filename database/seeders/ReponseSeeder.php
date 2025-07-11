<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReponseSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère tous les utilisateurs
        $utilisateurs = DB::table('utilisateurs')->get();

        // Récupère tous les cours
        $cours = DB::table('cours')->get();

        // Pour chaque utilisateur
        foreach ($utilisateurs as $utilisateur) {

            // Pour chaque cours
            foreach ($cours as $coursResa) {

                // Enregistre une réservation (si elle n'existe pas déjà)
                DB::table('reserver')->insertOrIgnore([
                    'id_utilisateur' => $utilisateur->id_utilisateur,
                    'id_cours' => $coursResa->id_cours,
                    'date_reservation' => now(),
                    'statut' => 'validée',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Récupère les questions de ce cours
                $questions = DB::table('questions')
                    ->where('id_cours', $coursResa->id_cours)
                    ->get();

                // Pour chaque question, simule une réponse
                foreach ($questions as $question) {
                    DB::table('reponses')->insertOrIgnore([
                        'id_utilisateur' => $utilisateur->id_utilisateur,
                        'id_question' => $question->id_question,
                        'reponse_choisie' => 'Ma réponse',
                        'reponse_bonne_fausse' => rand(0, 1),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
