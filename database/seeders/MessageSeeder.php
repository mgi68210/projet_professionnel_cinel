<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;// bibliothèque de manipulation de dates/temps intégrée à Laravel.

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $userId = DB::table('utilisateurs')->value('id_utilisateur');

        DB::table('message')->insert([
            'id_message' => Str::uuid(),
            'id_utilisateur' => $userId,
            'objet' => 'Demande d\'infos',
            'contenu' => 'Bonjour, je souhaite avoir plus d\'infos sur le cours.',
            'date_envoi' => Carbon::now(), 
            'statut' => 'non lu',
        ]);
    }
}

