<?php

namespace App\Http\Controllers;

use App\Models\Reserver;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReserverController extends Controller
{
    public function reserver($id_cours)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Connectez-vous d’abord.');
        }

        // Récupère le cours avec le nombre d'utilisateurs déjà inscrits
        $cours = Cours::withCount('utilisateurs')->findOrFail($id_cours);

        // Vérifie si l'utilisateur a déjà réservé ce cours
        $dejaReserve = Reserver::where('id_cours', $id_cours)
            ->where('id_utilisateur', $user->id_utilisateur)
            ->exists();

        if ($dejaReserve) {
            return redirect()->route('planning.index')->with('error', 'Vous avez déjà réservé ce cours.');
        }

        // Vérifie si le cours est complet
        $statut = $cours->utilisateurs_count >= $cours->capacite_max ? 'en attente' : 'confirmée';

        // Crée la réservation
        Reserver::create([
            'id_utilisateur' => $user->id_utilisateur,
            'id_cours' => $id_cours,
            'date_reservation' => Carbon::now(),
            'statut' => $statut,
        ]);

        return redirect()->route('cours.mes_reservations')->with('success', 'Réservation enregistrée.');
    }

    public function annuler($id)
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login')->with('error', 'Connectez-vous d’abord.');
        }

        // Supprime la réservation
        Reserver::where('id_utilisateur', $utilisateur->id_utilisateur)
                ->where('id_cours', $id)
                ->delete();

        return redirect()->route('cours.mes_reservations')->with('success', 'Réservation annulée.');
    }
}
