<?php

namespace App\Http\Controllers;

use App\Models\Cours; 
use Illuminate\Support\Facades\Auth; // Vérification si y a bien connexion

class CoursController extends Controller
{

    public function index()
    {
// je cherche tous les cours dans la base de données
        $cours = Cours::all();

// j'envoie cette liste à la vue "cours.index"
        return view('cours.index', compact('cours'));
    }

// Fonction qui permet de reserver
    public function reserver($id)
    {
// Je récupère l'utilisateur connecté
        $utilisateur = Auth::user();

// Si personne n'est connecté, je le renvoie vers la page de connexion
        if (!$utilisateur) {
            return redirect()->route('login')->withErrors([
                'email' => 'Veuillez vous connecter pour réserver.'
            ]);
        }

// Je récupère le cours demandé (et on compte combien d'utilisateurs y sont déjà inscrits)
        $cours = Cours::withCount('utilisateurs')->findOrFail($id);

 //Le cours est-il déjà reservé par un utilisateur? 
        $dejaReserve = $utilisateur->cours()
            ->where('reserver.id_cours', $id) //Je vérifie dans la table pivot reserver
            ->exists(); // est ce que la reservation existe déjà

 // Si oui, je le prévient et on ne fait rien
        if ($dejaReserve) {
            return redirect()->back()->with('error', ' Vous avez déjà réservé ce cours.');
        }
// Je récupère le nombre maximum de places pour ce cours
        $capaciteMax = $cours->capacite_max;

// Je regarde combien de personnes sont déjà inscrites
        $nombreActuel = $cours->utilisateurs_count;

// Si c’est plein, je met le statut à "en attente", sinon à "confirmée"
        $statut = ($nombreActuel >= $capaciteMax) ? 'en attente' : 'confirmée';

// J'ajoute la réservation dans la table "reserver" (relation many-to-many)
        $utilisateur->cours()->attach($id, [
            'date_reservation' => now(), // date du jour
            'statut' => $statut           // selon les places, en attente ou reserver
        ]);

// Je crée un petit message
        $message = $statut === 'confirmée'
            ? ' Réservation confirmée avec succès !'
            : ' Le cours est complet, vous êtes placé en liste d’attente.';

// Je renvoie l'utilisateur vers la page des cours avec le message
        return redirect()->route('cours.index')->with('success', $message);
    }

// fonction qui permet de voir les cours reservés
    public function mesReservations()
    {
// Le connecté
        $utilisateur = Auth::user();

// Si personne, il doit se connecter
        if (!$utilisateur) {
            return redirect()->route('login');
        }

// Je prends tous les cours reservés
        $reservations = $utilisateur->cours()->withPivot('statut', 'date_reservation')->get();

// je redirige ça vers la vue mes reservations
        return view('cours.mes_reservations', compact('reservations'));
    }

// la vue du planning
public function planning()
{
    $cours = Cours::all(); //  tous les cours
    return view('cours.planning', compact('cours'));
}

public function confirmer($id)
{
    $cours = Cours::findOrFail($id);
    return view('cours.confirmer', compact('cours'));
}

}
