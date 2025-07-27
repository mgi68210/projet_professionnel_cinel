<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class ReponseSeeder extends Seeder
{
   public function run(): void
{
    // Supprime toutes les réponses avant d'insérer de nouvelles
    \App\Models\Reponse::truncate();

    $utilisateurs = DB::table('utilisateurs')->get();
    $cours = DB::table('cours')->get();

    foreach ($utilisateurs as $utilisateur) {
        foreach ($cours as $coursResa) {
            DB::table('reserver')->insertOrIgnore([
                'id_utilisateur' => $utilisateur->id_utilisateur,
                'id_cours' => $coursResa->id_cours,
                'date_reservation' => now(),
                'statut' => 'validée',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $questions = DB::table('questions')
                ->where('id_cours', $coursResa->id_cours)
                ->get();

            foreach ($questions as $question) {
                \App\Models\Reponse::create([
                    'id_utilisateur' => $utilisateur->id_utilisateur,
                    'id_question' => $question->id_question,
                    'reponse_choisie' => 'Réponse C',
                    'reponse_bonne_fausse' => 0,
                ]);
            }
        }
    }
}
}