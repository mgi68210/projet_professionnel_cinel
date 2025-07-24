<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\Question;
use App\Models\Reponse;

class QuestionController extends Controller
{
    // Affiche les cours réservés contenant des questions
public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $utilisateur = Auth::user();

    // S'assurer que c'est bien un Utilisateur et pas un Admin
    if (!$utilisateur instanceof \App\Models\Utilisateur) {
        return redirect()->route('accueil');
    }

    // Récupère tous les cours réservés qui ont des questions
    $cours = $utilisateur->cours()->whereHas('questions')->get();

    return view('questions.index', compact('cours'));
}


    // Affiche les questions d’un cours réservé
    public function show($id_cours)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $utilisateur = Auth::user();

    // Je vérifie si l’utilisateur a bien réservé ce cours
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();
        if (!$cours) {
            return redirect('/quiz')->with('error', 'Vous devez réserver ce cours pour accéder aux questions.');
        }

    // Je récupère toutes les questions liées à ce cours
        $questions = $cours->questions;

        return view('questions.show', compact('cours', 'questions'));
    }

    // Enregistrement des réponses de l’utilisateur
    public function submit(Request $request, $id_cours)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $utilisateur = Auth::user();

        // Vérifie que l’utilisateur a réservé ce cours
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();
        if (!$cours) {
            return redirect('/quiz')->with('error', 'Action non autorisée.');
        }

        // Je récupère les questions de ce cours
        $questions = $cours->questions;

        foreach ($questions as $question) {
            $champ = 'question_' . $question->id_question;

            $reponseUtilisateur = $request->input($champ);

            if ($reponseUtilisateur !== null) {
                $estBonne = strtolower(trim($reponseUtilisateur)) === strtolower(trim($question->texte_reponse));

                // J’enregistre ou je mets à jour la réponse
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

        return redirect('/quiz')->with('success', 'Vos réponses ont bien été enregistrées.');
    }
}
