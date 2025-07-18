<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Support\Facades\Auth;

class ReponseController extends Controller
{
    //Vue des réponses de l'utilisateur connecté
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $utilisateur = Auth::user();

        // Je récupère toutes les réponses avec la question liée
        $reponses = Reponse::where('id_utilisateur', $utilisateur->id_utilisateur)
                           ->with('question')
                           ->get();

        return view('reponses.index', compact('reponses'));
    }
}
