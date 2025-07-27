<?php

namespace App\Http\Controllers;

use App\Models\Noter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoterController extends Controller
{
    // Affiche les cours réservés mais pas encore notés
    public function formulaire()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $utilisateur = Auth::user();

        // je récupère tous les cours réservés par l’utilisateur
        $coursReserves = $utilisateur->cours; 

        // filter = garde que les cours PAS encore notés
        $coursANoter = $coursReserves->filter(function ($cours) use ($utilisateur) {
            return !$cours->noter()
                        ->where('id_utilisateur', $utilisateur->id_utilisateur)
                        ->exists();
        });

        return view('noter.formulaire', [
            'coursANoter' => $coursANoter
        ]);
    }

    // Crée une note si l’utilisateur a réservé ce cours
    public function envoyer(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $utilisateur = Auth::user();

        $request->validate([
            'id_cours' => 'required|uuid|exists:cours,id_cours',
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|string|max:1000',
        ]);

// Je vérifie que l’utilisateur a réservé ce cours, SINON = message d'erreur
        $cours = $utilisateur->cours->where('id_cours', $request->id_cours)->first();
        if (!$cours) {
            return redirect('/noter')->with('error', 'Vous ne pouvez pas noter ce cours car vous ne l’avez pas réservé.');
        }

        // Je crée ou met à jour la note
        $note = Noter::updateOrCreate(
            ['id_utilisateur' => $utilisateur->id_utilisateur, 'id_cours' => $request->id_cours],
            [
                'note_satisfaction' => $request->note,
                'commentaire' => $request->commentaire,
                'date_remplissage' => now(),
            ]
        );

        // renvoie directement la vue de détail
        return view('noter.detail', compact('utilisateur', 'cours', 'note'));
    }

    // Vue du formulaire pour la modification
    public function modifier($id_cours)
    {
        if (!Auth::check()) return redirect('/login');

        $utilisateur = Auth::user();

// Je vérifie que l’utilisateur a réservé ce cours, SINON = message d'erreur
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();
        if (!$cours) {
            return redirect('/')->with('error', 'Action non autorisée.');
        }

        // je récupère la note correspondante
        $note = Noter::where('id_utilisateur', $utilisateur->id_utilisateur)
                     ->where('id_cours', $id_cours)
                     ->firstOrFail();

            return view('noter.modifier', compact('note', 'cours'));
    }

    // Je fais la mise à jour de la note
    public function MAJ(Request $request, $id_cours)
    {
        if (!Auth::check()) return redirect('/login');

        $utilisateur = Auth::user();

        $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|string|max:1000',
        ]);

// Je vérifie que l’utilisateur a réservé ce cours, SINON = message d'erreur
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();
        if (!$cours) {
            return redirect('/')->with('error', 'Action non autorisée.');
        }

        Noter::where('id_utilisateur', $utilisateur->id_utilisateur)
            ->where('id_cours', $id_cours)
            ->update([
                'note_satisfaction' => $request->note,
                'commentaire' => $request->commentaire,
                'date_remplissage' => now(),
            ]);

        return redirect('/')->with('success', 'Votre avis a été mis à jour.');
    }

    // Pour supprimer la note
    public function supprimer($id_cours)
    {
        if (!Auth::check()) return redirect('/login');

        $utilisateur = Auth::user();

// Je vérifie que l’utilisateur a réservé ce cours, SINON = message d'erreur
        $cours = $utilisateur->cours->where('id_cours', $id_cours)->first();
        if (!$cours) {
            return redirect('/')->with('error', 'Action non autorisée.');
        }

        Noter::where('id_utilisateur', $utilisateur->id_utilisateur)
            ->where('id_cours', $id_cours)
            ->delete();

        return redirect('/')->with('success', 'Votre avis a été supprimé.');
    }
}
