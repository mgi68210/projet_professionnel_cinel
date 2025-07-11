<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Support\Facades\Auth;

class ReponseController extends Controller
{
    // ✅ Affiche toutes les réponses du user connecté
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $utilisateur = Auth::user();

        // On récupère toutes les réponses avec la question liée
        $reponses = Reponse::where('id_utilisateur', $utilisateur->id_utilisateur)
                           ->with('question')
                           ->get();

        return view('reponses.index', compact('reponses'));
    }
}
