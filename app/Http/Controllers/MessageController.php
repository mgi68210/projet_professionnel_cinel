<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    // Affiche le formulaire 
    public function create()
    {
        return view('message.form'); 
    }

    // Enregistre le message dans la base de données
    public function submit(Request $request)
    {
        // connexion faites?
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Champs obligatoires
        $request->validate([
            'objet' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        // Création et enregistrement des messages dans la ddb
        Message::create([
            'id_utilisateur' => Auth::user()->id_utilisateur, // l'utilisateur connecté
            'objet' => $request->input('objet'),             
            'contenu' => $request->input('contenu'),        
            'date_envoi' => Carbon::now(),                    
            'statut' => 'non lu',                             
        ]);

        return redirect()->back()->with('success', ' Message envoyé avec succès !');
    }

    // Admin > vue sur les messages
    public function index()
    {
        //Je prends tous les messages et les infos de l'utilisateur
        $messages = Message::with('utilisateur')->latest()->get();

        return view('message.index', compact('messages'));
    }
}
