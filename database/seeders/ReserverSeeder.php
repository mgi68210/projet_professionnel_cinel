<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;          
use Illuminate\Support\Facades\DB;        
use Carbon\Carbon;                     

class ReserverSeeder extends Seeder
{
    public function run(): void
    {
//  Je récupère tous les identifiants (ID) des utilisateurs dans la base
        $utilisateurs = DB::table('utilisateurs')->pluck('id_utilisateur');
        // Résultat : une liste comme ["uuid1", "uuid2", "uuid3", ...]

        //  Je récupère tous les identifiants (ID) des cours disponibles
        $cours = DB::table('cours')->pluck('id_cours');
        // Résultat : une liste comme ["uuid_cours1", "uuid_cours2", "uuid_cours3", ...]

        //  Liste des statuts possibles pour une réservation
        $statuts = ['confirmée', 'en attente'];

        // Je fais une boucle pour chaque utilisateur (pour leur attribuer une réservation)
        foreach ($utilisateurs as $utilisateurId) {

    //  Je choisis un cours au hasard dans la liste des cours
            $coursId = $cours->random(); // méthode random() = sélectionne 1 élément au hasard

    //  Je choisis un statut au hasard (soit "confirmée", soit "en attente")
            $statut = $statuts[array_rand($statuts)]; // array_rand() choisit un index au hasard

    //  J'enregistre une nouvelle réservation dans la table "reserver"
            DB::table('reserver')->insert([
                'id_utilisateur'    => $utilisateurId,               
                'id_cours'          => $coursId,              
                'date_reservation'  => Carbon::now(),         
                'statut'            => $statut,              
                'created_at'        => now(),                 
                'updated_at'        => now(),               
            ]);
        }

    }
}
