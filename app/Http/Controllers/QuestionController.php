<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Cours;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    //Afficher toutes les questions
    public function index()
    {
        $questions = Question::with('cours')->get();
        return view('questions.index', compact('questions'));
    }

    //Formulaire pour ajouter une nouvelle question
    public function create()
    {
        $cours = Cours::all(); // pour choisir le cours
        return view('questions.create', compact('cours'));
    }

    //Enregistrer une nouvelle question
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:25',
            'texte_question' => 'required|string',
            'texte_reponse' => 'required|string',
            'id_cours' => 'required|exists:cours,id_cours',
        ]);

        Question::create([
            'id_question' => Str::uuid(),
            'type' => $request->type,
            'texte_question' => $request->texte_question,
            'texte_reponse' => $request->texte_reponse,
            'id_cours' => $request->id_cours,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question ajoutée !');
    }

    // Afficher une question précise
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show', compact('question'));
    }

    // Formulaire d’édition d'une question
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $cours = Cours::all();
        return view('questions.edit', compact('question', 'cours'));
    }

    // Enregistrer la mise à jour
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:25',
            'texte_question' => 'required|string',
            'texte_reponse' => 'required|string',
            'id_cours' => 'required|exists:cours,id_cours',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'type' => $request->type,
            'texte_question' => $request->texte_question,
            'texte_reponse' => $request->texte_reponse,
            'id_cours' => $request->id_cours,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question mise à jour.');
    }

    // Supprimer une question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question supprimée.');
    }
}
