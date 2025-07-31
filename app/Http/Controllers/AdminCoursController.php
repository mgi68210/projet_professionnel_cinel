<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
class AdminCoursController extends Controller
{


public function index()
{
    $cours = Cours::orderBy('date_heure', 'asc')->get();

    return view('admin.cours.index', compact('cours')); 
}

// Formulaire d’ajout
    public function create()
    {
        return view('cours.create');
    }

// Enregistre un nouveau cours
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date_heure' => 'required|date',
            'capacite_max' => 'required|integer',
            'tranche_age' => 'nullable|string',
        ]);

        Cours::create($request->all());

        return redirect()->route('admin.cours.index')->with('success', 'Cours ajouté.');
    }

// Formulaire de modification
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.edit', compact('cours'));
    }

    // Enregistre la modification
    public function update(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);

        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date_heure' => 'required|date',
            'capacite_max' => 'required|integer',
            'tranche_age' => 'nullable|string',
        ]);

        $cours->update($request->all());

        return redirect()->route('admin.cours.index')->with('success', 'Cours modifié.');
    }

    // Suppression
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('admin.cours.index')->with('success', 'Cours supprimé.');
    }
}
