<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use App\Models\Machine;
use App\Models\Modele;
use App\Models\TypeAccessoire;
use Illuminate\Http\Request;

class AccessoireController extends Controller
{
    public function index(Request $request)
    {
        $query = Accessoire::with(['machine', 'modele.marque', 'typeAccessoire']);

        // Filtres
        if ($request->filled('machine')) {
            $query->where('machine_id', $request->machine);
        }
        if ($request->filled('type')) {
            $query->where('type_accessoire_id', $request->type);
        }
        if ($request->filled('marque')) {
            $query->whereHas('modele', function($q) use ($request) {
                $q->where('marque_id', $request->marque);
            });
        }

        $accessoires = $query->paginate(6);

        // Données pour les filtres
        $machines = Machine::all();
        $types = TypeAccessoire::all();
        $modeles = Modele::with('marque')->where('type', 'accessoire')->get();

        return view('accessoires.index', compact('accessoires', 'machines', 'types', 'modeles'));
    }

    public function create(Request $request)
    {
        $machines = Machine::all();
        $types = TypeAccessoire::all();
        $modeles = Modele::with('marque')->where('type', 'accessoire')->get();

        // Pré-sélectionner la machine si machine_id est fourni
        $selectedMachine = $request->input('machine_id');

        return view('accessoires.create', compact('machines', 'types', 'modeles', 'selectedMachine'));
    }
    /**
     * Enregistre un nouveau accessoire
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine_id' => 'nullable|exists:machines,id',
            'modele_id' => 'required|exists:modeles,id',
            'type_accessoire_id' => 'required|exists:type_accessoires,id',
            'numero_serie' => 'required|unique:accessoires,numero_serie',
            'localisation' => 'required|string',
            'detail' => 'nullable|string',
            'commentaire' => 'nullable|string'
        ]);

        Accessoire::create($validated);

        return redirect()->route('accessoires.index')
            ->with('success', 'Accessoire créé avec succès.');
    }
    /**
     * affiche un  accessoire
     */
    public function show(Accessoire $accessoire)
    {
        $accessoire->load(['machine', 'modele.marque', 'typeAccessoire']);
        return view('accessoires.show', compact('accessoire'));
    }
    /**
     * Affiche le formulaire de modification
     */
    public function edit(Accessoire $accessoire)
    {
        $machines = Machine::all();
        $types = TypeAccessoire::all();
        $modeles = Modele::with('marque')->where('type', 'accessoire')->get();

        return view('accessoires.edit', compact('accessoire', 'machines', 'types', 'modeles'));
    }
    /**
     * Mettre à jour un accessoire
     */
    public function update(Request $request, Accessoire $accessoire)
    {
        $validated = $request->validate([
            'machine_id' => 'nullable|exists:machines,id',
            'modele_id' => 'required|exists:modeles,id',
            'type_accessoire_id' => 'required|exists:type_accessoires,id',
            'numero_serie' => 'required|unique:accessoires,numero_serie,'.$accessoire->id,
            'localisation' => 'required|string',
            'detail' => 'nullable|string',
            'commentaire' => 'nullable|string'
        ]);

        $accessoire->update($validated);

        return redirect()->route('accessoires.index')
            ->with('success', 'Accessoire mis à jour avec succès.');
    }
    /**
     * Supprimer un accesoire
     */
    public function destroy(Accessoire $accessoire)
    {
        $accessoire->delete();

        return redirect()->route('accessoires.index')
            ->with('success', 'Accessoire supprimé avec succès.');
    }
}
