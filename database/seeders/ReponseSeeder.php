<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reponse;

class ReponseSeeder extends Seeder
{
    public function run(): void
    {
        $utilisateurs = DB::table('utilisateurs')->get();
        $cours = DB::table('cours')->get();

        foreach ($utilisateurs as $utilisateur) {
            foreach ($cours as $coursResa) {
                // Réservation (sans doublons)
                DB::table('reserver')->insertOrIgnore([
                    'id_utilisateur' => $utilisateur->id_utilisateur,
                    'id_cours' => $coursResa->id_cours,
                    'date_reservation' => now(),
                    'statut' => 'validée',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Questions liées à ce cours
                $questions = DB::table('questions')
                    ->where('id_cours', $coursResa->id_cours)
                    ->get();

                foreach ($questions as $question) {
                    // Vérifie si une réponse existe déjà
                    $dejaRepondu = Reponse::where('id_utilisateur', $utilisateur->id_utilisateur)
                                          ->where('id_question', $question->id_question)
                                          ->exists();

                    if (!$dejaRepondu) {
                        // Crée une nouvelle réponse
                        Reponse::create([
                            'id_utilisateur' => $utilisateur->id_utilisateur,
                            'id_question' => $question->id_question,
                            'reponse_choisie' => 'Ma réponse',
                            'reponse_bonne_fausse' => rand(0, 1),
                        ]);
                    }
                }
            }
        }
    }
}
