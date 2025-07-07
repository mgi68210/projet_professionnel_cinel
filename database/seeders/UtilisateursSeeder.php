<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UtilisateursSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('utilisateurs')->insert([
            [
                'id_utilisateur' => Str::uuid(),
                'nom' => 'Julien',
                'prenom' => 'Est',
                'email' => 'julien@me.com',
                'mot_de_passe' => Hash::make('1234'),
            ],
            [
                'id_utilisateur' => Str::uuid(),
                'nom' => 'Jacinta',
                'prenom' => 'Gomes',
                'email' => 'jacinta@me.com',
                'mot_de_passe' => Hash::make('1234'),
            ],
            [
                'id_utilisateur' => Str::uuid(),
                'nom' => 'Marie',
                'prenom' => 'Gilot',
                'email' => 'marie@gmail.com',
                'mot_de_passe' => Hash::make('1234'),
            ],
        ]);
    }
}
