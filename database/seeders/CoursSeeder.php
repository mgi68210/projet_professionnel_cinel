<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Cours;

class CoursSeeder extends Seeder
{
    public function run(): void
    {
        //  Liste de plusieurs cours à insérer
        $coursList = [
            [
                'titre' => 'Scénarisation',
                'description' => 'Apprenez à écrire un scénario de film',
                'tranche_age' => 'Adultes',
                'capacite_max' => 10,
                'date_heure' => '2025-06-15 10:00:00',
            ],
            [
                'titre' => 'Réalisation',
                'description' => "Découvrez la direction d'un film",
                'tranche_age' => 'Adolescents',
                'capacite_max' => 12,
                'date_heure' => '2025-06-16 14:00:00',
            ],
            [
                'titre' => 'Montage Vidéo',
                'description' => 'Maîtrisez les bases du montage vidéo',
                'tranche_age' => 'Tous',
                'capacite_max' => 15,
                'date_heure' => '2025-06-17 16:00:00',
            ],
            [
                'titre' => 'Cinématographie',
                'description' => 'Comprendre les mouvements de caméra et les lumières',
                'tranche_age' => 'Adultes',
                'capacite_max' => 10,
                'date_heure' => '2025-06-20 13:30:00',
            ],
            [
                'titre' => 'Production',
                'description' => 'Organiser un tournage de A à Z',
                'tranche_age' => 'Adolescents',
                'capacite_max' => 8,
                'date_heure' => '2025-06-22 11:00:00',
            ],
        ];

        //  On insère chaque cours un par un
        foreach ($coursList as $data) {
            Cours::create([
                'id_cours' => Str::uuid(),           
                'titre' => $data['titre'],             
                'description' => $data['description'], 
                'tranche_age' => $data['tranche_age'], 
                'capacite_max' => $data['capacite_max'], 
                'date_heure' => $data['date_heure'],    
            ]);
        }
    }
}
