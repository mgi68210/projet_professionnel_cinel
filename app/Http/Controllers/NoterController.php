<?php

namespace App\Http\Controllers;

use App\Models\Noter;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoterController extends Controller
{
    // Affiche le formulaire avec les cours réservés disponibles à noter
    public function vueform()
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        $coursDisponibles = $utilisateur->cours()->get(); // Cours réservés
        return view('noter.formulaire', compact('coursDisponibles'));
    }

    // Affiche le formulaire de notation pour un cours en particulier
    public function form($id_cours)
    {
        $cours = Cours::findOrFail($id_cours);
        return view('noter.formulaire', compact('cours'));
    }

    // Envoie du formulaire de notation
    public function submit(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::user()->id_utilisateur;

        // Validation du formulaire
        $request->validate([
            'id_cours' => 'required|uuid|exists:cours,id_cours',
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|string|max:1000',
        ]);

        $coursId = $request->input('id_cours');
        $note = $request->input('note');
        $commentaire = $request->input('commentaire');

        // Vérifie si l’utilisateur a déjà noté ce cours
        $existe = Noter::where('id_utilisateur', $userId)
                        ->where('id_cours', $coursId)
                        ->first();

        if ($existe) {
            // Mise à jour de la note existante
            $existe->update([
                'note_satisfaction' => $note,
                'commentaire' => $commentaire,
                'date_remplissage' => now(),
            ]);

            return redirect()->route('home')->with('success', 'Avis mis à jour.');
        } else {
            // Création d’un nouvel avis
            Noter::create([
                'id_utilisateur' => $userId,
                'id_cours' => $coursId,
                'note_satisfaction' => $note,
                'commentaire' => $commentaire,
                'date_remplissage' => now(),
            ]);

            return redirect()->route('home')->with('success', 'Avis enregistré.');
        }
    }

    // Supprimer une note
    public function delete($id_utilisateur, $id_cours)
    {
        Noter::where('id_utilisateur', $id_utilisateur)
             ->where('id_cours', $id_cours)
             ->delete();

        return redirect()->back()->with('success', 'Avis supprimé.');
    }
}
