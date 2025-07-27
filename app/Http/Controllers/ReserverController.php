<?php

namespace App\Http\Controllers;

use App\Models\Reserver;
use App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReserverController extends Controller
{
    public function reserver($id_cours)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $cours = Cours::withCount('utilisateurs')->findOrFail($id_cours);

        $dejaReserve = Reserver::where('id_cours', $id_cours)
            ->where('id_utilisateur', $user->id_utilisateur)
            ->exists();

        if ($dejaReserve) {
            return redirect()->route('cours.planning')->with('error', 'Vous avez déjà réservé ce cours.');
        }

        $statut = ($cours->utilisateurs_total >= $cours->capacite_max) ? 'en attente' : 'confirmée';

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
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $utilisateur->cours()->detach($id);

        return redirect()->route('cours.liste')->with('success', 'Votre réservation a été annulée.');
    }
}
