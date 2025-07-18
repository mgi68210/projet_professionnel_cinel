<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\Question;
use App\Models\Reponse;

class QuestionController extends Controller
{
    // Page qui affiche tous les cours avec des questions
    public function index()
    {
        // Je récupère l'utilisateur connecté
        $utilisateur = Auth::user();

        // S'il n'est pas connecté, je le renvoie vers la page de connexion
        if (!$utilisateur) {
            return redirect()->route('login');
        }

        // Je récupère les cours que l'utilisateur a réservés et qui ont des questions
        $cours = $utilisateur->cours()->whereHas('questions')->get();

        // J'envoie ça à la vue
        return view('questions.index', compact('cours'));
    }

    // Page qui affiche les questions d’un cours
    public function show($id_cours)
    {
        // Je récupère l'utilisateur connecté
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        // Je vérifie que l'utilisateur a bien réservé ce cours
        if (!$utilisateur->cours->contains('id_cours', $id_cours)) {
            return redirect()->route('questions.index')->with('error', 'Vous devez réserver ce cours.');
        }

        // Je récupère le cours et les questions
        $cours = Cours::findOrFail($id_cours);
        $questions = $cours->questions;

        // J'affiche la vue
        return view('questions.show', compact('cours', 'questions'));
    }

    // Quand l'utilisateur soumet ses réponses
    public function submit(Request $request, $id_cours)
    {
        // Je vérifie que l'utilisateur est connecté
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        // Je récupère toutes les questions de ce cours
        $questions = Question::where('id_cours', $id_cours)->get();

        foreach ($questions as $question) {
            // Le nom du champ dans le formulaire
            $champInput = 'question_' . $question->id_question;

            // Je récupère la réponse tapée par l'utilisateur
            $reponseUtilisateur = $request->input($champInput);

            // Si une réponse a été donnée
            if ($reponseUtilisateur !== null) {
                // Est-ce que la réponse est bonne ?
                $estBonne = strtolower(trim($reponseUtilisateur)) === strtolower(trim($question->texte_reponse));

                // J’enregistre la réponse dans la table "reponses"
                Reponse::updateOrCreate(
                    [
                        'id_utilisateur' => $utilisateur->id_utilisateur,
                        'id_question' => $question->id_question,
                    ],
                    [
                        'reponse_choisie' => $reponseUtilisateur,
                        'reponse_bonne_fausse' => $estBonne,
                    ]
                );
            }
        }

        // Je redirige avec un message
        return redirect()->route('questions.index')->with('success', 'Réponses enregistrées.');
    }
}
