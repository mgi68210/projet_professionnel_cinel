<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NoterSeeder extends Seeder
{
    public function run(): void
    {
        // Je récupère tous les utilisateurs (juste leurs IDs)
        $utilisateurs = DB::table('utilisateurs')->pluck('id_utilisateur');

        // Je récupère tous les cours (juste leurs IDs aussi)
        $cours = DB::table('cours')->pluck('id_cours');

        $commentaires = [
            'Très bon cours !',
            'J’ai appris plein de choses 👍',
            'Un peu difficile mais intéressant.',
            'Le formateur était super 👏',
            'Je recommande ce cours !',
            'Bonne ambiance, merci !',
            'Je m’attendais à mieux.',
            'Top, je reviendrai !',
        ];

        // Pour chaque utilisateur
        foreach ($utilisateurs as $userId) {

            // Je prends un cours au hasard
            $coursId = $cours->random();

            // Je choisis un commentaire au hasard
            $commentaire = $commentaires[array_rand($commentaires)];

            // Je donne une note entre 3 et 5 
            $note = rand(3, 5);

            // J'ajoute une ligne dans la table "noter"
            DB::table('noter')->insert([
                'id_utilisateur'     => $userId,
                'id_cours'           => $coursId,
                'note_satisfaction'  => $note,
                'commentaire'        => $commentaire,
                'date_remplissage'   => Carbon::now(),
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }
}
