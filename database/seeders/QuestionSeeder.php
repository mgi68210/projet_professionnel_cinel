<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Cours;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $coursList = Cours::all();

        foreach ($coursList as $cours) {
            $questionTexte = '';
            $reponses = '';

            switch ($cours->titre) {
                case 'Scénarisation':
                    $questionTexte = 'Quel est le rôle du protagoniste ?';
                    $reponses = 'Le héros||Le figurant||Le personnage principal||Le décorateur';
                    break;

                case 'Réalisation':
                    $questionTexte = 'Que fait un réalisateur ?';
                    $reponses = 'Il filme||Il écrit la musique||Il monte les scènes||Il éclaire';
                    break;

                case 'Montage Vidéo':
                    $questionTexte = 'Quel est l’objectif du montage ?';
                    $reponses = 'Rendre la vidéo fluide||Ajouter du son||Créer les costumes||Filmer les scènes';
                    break;

                default:
                    $questionTexte = 'Question générique pour le cours ' . $cours->titre;
                    $reponses = 'Réponse A||Réponse B||Réponse C||Réponse D';
                    break;
            }

            Question::create([
                'id_question' => (string) Str::uuid(),
                'type' => 'QCM',
                'texte_question' => $questionTexte,
                'texte_reponse' => $reponses,
                'id_cours' => $cours->id_cours,
            ]);
        }
    }
}
