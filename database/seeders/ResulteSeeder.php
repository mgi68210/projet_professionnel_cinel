<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 📦 Pour interagir avec la base de données

class ResulteSeeder extends Seeder
{
    public function run(): void
    {
        // Je récupère les vrais UUID des cours en fonction de leur titre
        $cours1 = DB::table('cours')->where('titre', 'Scénarisation')->value('id_cours');
        $cours2 = DB::table('cours')->where('titre', 'Réalisation')->value('id_cours');
        $cours3 = DB::table('cours')->where('titre', 'Montage Vidéo')->value('id_cours');

        // Pour chaque cours, Je récupère le premier quiz lié à ce cours
        $quiz1 = DB::table('quiz')->where('id_cours', $cours1)->value('id_quiz');
        $quiz2 = DB::table('quiz')->where('id_cours', $cours2)->value('id_quiz');
        $quiz3 = DB::table('quiz')->where('id_cours', $cours3)->value('id_quiz');

        // J'insère les relations entre cours et quiz dans la table "resulte"
        DB::table('resulte')->insert([
            [
                'id_cours' => $cours1, //  Lien entre le cours "Scénarisation" et son quiz
                'id_quiz' => $quiz1,
            ],
            [
                'id_cours' => $cours2, //  Lien entre le cours "Réalisation" et son quiz
                'id_quiz' => $quiz2,
            ],
            [
                'id_cours' => $cours3, //  Lien entre le cours "Montage Vidéo" et son quiz
                'id_quiz' => $quiz3,
            ],
        ]);

        //  Chaque cours est maintenant relié à un quiz via la table "resulte"
    }
}
