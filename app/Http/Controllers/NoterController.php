<?php
namespace App\Http\Controllers;

use App\Models\Noter;
use App\Models\Cours;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NoterController extends Controller
{


public function vueform()
{
    $coursDisponibles = Auth::user()->cours; // cours réservés par l’utilisateur connecté
    return view('noter.formulaire', compact('coursDisponibles'));
}


    public function form($id_cours)
    {
        $cours = Cours::findOrFail($id_cours);
        return view('noter.formulaire', compact('cours'));
    }

    public function submit(Request $request){
// quelqu'un de connecté? 
    if (!Auth::check()) {
        return redirect()->route('login');
    }

// ID de l'utilisateur connecté
    $userId = Auth::user()->id_utilisateur;

 // Champs obligatoire pour noter
    $request->validate([
        'id_cours' => 'required|uuid|exists:cours,id_cours',
        'note' => 'required|integer|min:1|max:5',
        'commentaire' => 'nullable|string|max:1000',
    ]);

//Je Récupère les données du formulaire
    $coursId = $request->input('id_cours');
    $note = $request->input('note');
    $commentaire = $request->input('commentaire');

    // Est ce que l'utilisateur a déjà noté ce cours? 
    $existe = Noter::where('id_utilisateur', $userId)
                    ->where('id_cours', $coursId)
                    ->first();

    if ($existe) {
        // Si oui, je le mets à jour
        $existe->update([
            'note_satisfaction' => $note,
            'commentaire' => $commentaire,
            'date_remplissage' => now(),
        ]);

        return redirect()->route('home')->with('succes', ' Votre avis a été mis à jour.');
    } else {
// Sinon, J'enregistre l'avis
        Noter::create([
            'id_utilisateur' => $userId,
            'id_cours' => $coursId,
            'note_satisfaction' => $note,
            'commentaire' => $commentaire,
            'date_remplissage' => now(),
        ]);

        return redirect()->route('home');
    }
}

// fonction pour supprimer l'avis
    public function delete($id_utilisateur, $id_cours)
    {
        Noter::where('id_utilisateur', $id_utilisateur)
            ->where('id_cours', $id_cours)->delete();

        return redirect()->back()->with('success', ' L’avis a été supprimé.');
    }
}
