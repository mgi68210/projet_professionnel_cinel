<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\Question;
use App\Models\Reponse;

class QuestionController extends Controller
{
    // Liste des cours avec quiz pour l’utilisateur connecté
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $utilisateur = Auth::user();

        // S’assurer que c’est bien un Utilisateur (pas Admin)
        if (!$utilisateur instanceof \App\Models\Utilisateur) {
            return redirect()->route('accueil');
        }

        // Récupère les cours réservés avec questions
        $cours = $utilisateur->cours()->whereHas('questions')->get();

        return view('questions.index', compact('cours'));
    }

    //  Affiche les questions d’un cours
    public function show($id_cours)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $utilisateur = Auth::user();
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();

        if (!$cours) {
            return redirect('/quiz')->with('error', 'Vous devez réserver ce cours pour accéder aux questions.');
        }

        $questions = $cours->questions;

        return view('questions.show', compact('cours', 'questions'));
    }

    // Enregistre les réponses
    public function submit(Request $request, $id_cours)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $utilisateur = Auth::user();
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();

        if (!$cours) {
            return redirect('/quiz')->with('error', 'Action non autorisée.');
        }

        $questions = $cours->questions;

        foreach ($questions as $question) {
            $champ = 'question_' . $question->id_question;
            $reponseUtilisateur = $request->input($champ);

            if ($reponseUtilisateur !== null) {
                // Extraction de la bonne réponse depuis texte_reponse
                $options = explode('||', $question->texte_reponse);
                $bonneReponse = null;

                foreach ($options as $option) {
                    if (str_starts_with($option, '**')) {
                        $bonneReponse = ltrim($option, '*'); // retire les **
                        break;
                    }
                }

                // Nettoie la réponse utilisateur si elle avait des étoiles
                $reponseNettoyee = ltrim($reponseUtilisateur, '*');

                // Comparaison simple
                $estBonne = $bonneReponse && $reponseNettoyee === $bonneReponse;

                Reponse::updateOrCreate(
                    [
                        'id_utilisateur' => $utilisateur->id_utilisateur,
                        'id_question' => $question->id_question
                    ],
                    [
                        'reponse_choisie' => $reponseNettoyee,
                        'reponse_bonne_fausse' => $estBonne
                    ]
                );
            }
        }

            return redirect()->route('reponses.index')->with('success', 'Vos réponses ont bien été enregistrées.');
    }
}
