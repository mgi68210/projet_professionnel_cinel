<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pour gérer les connexions
use App\Models\Quiz;  
use App\Models\Cours;  

class QuizController extends Controller
{
    
    // Affiche la liste des cours qui ont un quiz

    public function index()
    {
        // Je vérifie que l’utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Je récupère tous les cours qui ont au moins un quiz associé
        $coursAvecQuiz = Cours::has('quiz')->get();

        //  J'affiche la vue avec tous les cours qui ont un quiz
        return view('quiz.index', compact('coursAvecQuiz'));
    }

    
    // J'affiche les questions du quiz pour un cours donné
    public function show($id_cours)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cours = Cours::findOrFail($id_cours);
        $quizList = Quiz::where('id_cours', $id_cours)->get();

        return view('quiz.show', compact('cours', 'quizList'));
    }

    
    // Je corrige le quiz et affiche les résultats
    public function submit(Request $request, $id_cours)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $quizList = Quiz::where('id_cours', $id_cours)->get();
        $correct = 0;
        $results = [];

        foreach ($quizList as $quiz) {
            $cle = 'reponse_' . $quiz->id_quiz;
            $reponse = $request->input($cle);
            $estCorrect = false;

            if (in_array($quiz->type, ['QCM', 'Vrai/Faux'])) {
                $estCorrect = ($reponse == '1');
            } elseif ($quiz->type === 'Libre') {
                $estCorrect = strtolower(trim($reponse)) === strtolower(trim($quiz->texte_reponse));
            }

            if ($estCorrect) {
                $correct++;
            }

            $results[] = [
                'question' => $quiz->texte_question,
                'user_answer' => $reponse,
                'correct_answer' => $quiz->texte_reponse,
                'is_correct' => $estCorrect
            ];
        }

        $total = count($quizList);
        $score = round(($correct / $total) * 100);
        $cours = Cours::findOrFail($id_cours);

        return view('quiz.result', compact('results', 'score', 'cours'));
    }
}
