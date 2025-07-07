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

public function formSansId()
{
    $coursDisponibles = Auth::user()->cours; // cours réservés par l’utilisateur connecté
    return view('noter.formulaire', compact('coursDisponibles'));
}


    public function form($id_cours)
    {
        $cours = Cours::findOrFail($id_cours);
        return view('noter.formulaire', compact('cours'));
    }

    public function submit(Request $request)
{
    // Vérifie que l'utilisateur est connecté
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // ID de l'utilisateur connecté
    $userId = Auth::user()->id_utilisateur;

    // Validation des champs
    $request->validate([
        'id_cours' => 'required|uuid|exists:cours,id_cours',
        'note' => 'required|integer|min:1|max:5',
        'commentaire' => 'nullable|string|max:1000',
    ]);

    //Je Récupère les données du formulaire
    $coursId = $request->input('id_cours');
    $note = $request->input('note');
    $commentaire = $request->input('commentaire');

    // Je vérifie si un avis existe déjà pour ce couple utilisateur + cours
    $existing = Noter::where('id_utilisateur', $userId)
                    ->where('id_cours', $coursId)
                    ->first();

    if ($existing) {
        // Mise à jour de l'avis existant
        $existing->update([
            'note_satisfaction' => $note,
            'commentaire' => $commentaire,
            'date_remplissage' => now(),
        ]);

        return redirect()->route('home')->with('success', ' Votre avis a été mis à jour.');
    } else {
        // Création d’un nouvel avis
        Noter::create([
            'id_utilisateur' => $userId,
            'id_cours' => $coursId,
            'note_satisfaction' => $note,
            'commentaire' => $commentaire,
            'date_remplissage' => now(),
        ]);

        return redirect()->route('home')->with('success', ' Merci pour votre avis !');
    }
}


    public function delete($id_utilisateur, $id_cours)
    {
        Noter::where('id_utilisateur', $id_utilisateur)
            ->where('id_cours', $id_cours)->delete();

        return redirect()->back()->with('success', ' L’avis a été supprimé.');
    }
}
