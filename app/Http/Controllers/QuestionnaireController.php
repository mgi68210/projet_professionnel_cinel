<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\Questionnaire;
use App\Models\Reponse;

class QuestionnaireController extends Controller
{
    // Vue des cours réservés avec des quiz
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $utilisateur = Auth::user();

        // Je recupère le ou les cours que l'utilisateur à reserver avec questionnaire
        $coursAvecQuiz = $utilisateur->cours()->has('questionnaires')->get();

        return view('quiz.index', compact('coursAvecQuiz'));
    }

    // Vue des questions par cours
    public function show($id_cours)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cours = Cours::findOrFail($id_cours);
        $questions = Questionnaire::where('id_cours', $id_cours)->get();

        return view('quiz.show', compact('cours', 'questions'));
    }

    //Affichage resultats / soumissions des réponses / enregistrement
    public function submit(Request $request, $id_cours)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $utilisateur = Auth::user();
        $questions = Questionnaire::where('id_cours', $id_cours)->get();

        $score = 0;
        $resultats = [];

        foreach ($questions as $question) {
            $champ = 'question_' . $question->id_questionnaire;
            $reponse = $request->input($champ);
            $correct = strtolower(trim($reponse)) === strtolower(trim($question->texte_reponse));

            Reponse::create([
                'id_utilisateur' => $utilisateur->id_utilisateur,
                'id_questionnaire' => $question->id_questionnaire,
                'reponse_choisie' => $reponse,
                'reponse_bonne_fausse' => $correct,
            ]);

            if ($correct) {
                $score++;
            }

            $resultats[] = [
                'question' => $question->texte_question,
                'votre_reponse' => $reponse,
                'bonne_reponse' => $question->texte_reponse,
                'est_correct' => $correct,
            ];
        }

        return view('quiz.result', compact('resultats', 'score'));
    }
}
