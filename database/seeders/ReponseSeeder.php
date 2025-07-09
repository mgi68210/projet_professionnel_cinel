<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReponseSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère les cours
        $cours1 = DB::table('cours')->where('titre', 'Scénarisation')->value('id_cours');
        $cours2 = DB::table('cours')->where('titre', 'Réalisation')->value('id_cours');
        $cours3 = DB::table('cours')->where('titre', 'Montage Vidéo')->value('id_cours');

        // On récupère les quiz
        $quiz1 = DB::table('quiz')->where('id_cours', $cours1)->value('id_quiz');
        $quiz2 = DB::table('quiz')->where('id_cours', $cours2)->value('id_quiz');
        $quiz3 = DB::table('quiz')->where('id_cours', $cours3)->value('id_quiz');

        // On insère les relations dans la table "resulte"
        DB::table('resulte')->insert([
            ['id_cours' => $cours1, 'id_quiz' => $quiz1],
            ['id_cours' => $cours2, 'id_quiz' => $quiz2],
            ['id_cours' => $cours3, 'id_quiz' => $quiz3],
        ]);

        // On récupère un utilisateur existant
        $userId = DB::table('utilisateurs')->where('email',)->value('id');

        DB::table('reservations')->insert([
            ['id_user' => $userId, 'id_cours' => $cours1],
            ['id_user' => $userId, 'id_cours' => $cours2],
            ['id_user' => $userId, 'id_cours' => $cours3],
        ]);
    }
}
