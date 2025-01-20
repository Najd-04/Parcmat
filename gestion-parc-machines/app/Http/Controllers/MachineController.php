<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Agence;
use App\Models\Modele;
use App\Models\TypeMachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Affiche la liste des machines avec filtres
     */
    public function index(Request $request)
    {
        $query = Machine::with(['agence', 'modele.marque', 'typeMachine']);

        // Filtre par agence
        if ($request->filled('agence')) {
            $query->where('agence_id', $request->agence);
        }

        // Filtre par type
        if ($request->filled('type')) {
            $query->where('type_machine_id', $request->type);
        }

        // Filtre par marque
        if ($request->filled('marque')) {
            $query->whereHas('modele', function($q) use ($request) {
                $q->where('marque_id', $request->marque);
            });
        }
        // Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('numero_serie', 'like', "%{$search}%")
                    ->orWhere('localisation', 'like', "%{$search}%")
                    ->orWhereHas('agence', function($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%");
                    })
                    ->orWhereHas('modele', function($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%");
                    })
                    ->orWhereHas('modele.marque', function($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%");
                    });
            });
        }

        $machines = $query->paginate(6);

        // Conserver les paramètres de recherche dans la pagination
        $machines->appends($request->all());

        $agences = Agence::all();
        $types = TypeMachine::all();
        $modeles = Modele::with('marque')->where('type', 'machine')->get();

        return view('machines.index', compact('machines', 'agences', 'types', 'modeles'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $agences = Agence::all();
        $types = TypeMachine::all();
        $modeles = Modele::with('marque')->where('type', 'machine')->get();

        return view('machines.create', compact('agences', 'types', 'modeles'));
    }

    /**
     * Enregistre une nouvelle machine
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'agence_id' => 'required|exists:agences,id',
            'modele_id' => 'required|exists:modeles,id',
            'type_machine_id' => 'required|exists:type_machines,id',
            'numero_serie' => 'required|unique:machines,numero_serie',
            'localisation' => 'required|string',
            'detail_appareil' => 'nullable|string',
            'commentaire' => 'nullable|string'
        ]);

        Machine::create($validated);

        return redirect()->route('machines.index')
            ->with('success', 'Machine créée avec succès.');
    }

    /**
     * Affiche une machine spécifique
     */
    public function show(Machine $machine)
    {
        $machine->load(['agence', 'modele.marque', 'typeMachine', 'accessoires']);
        return view('machines.show', compact('machine'));
    }

    /**
     * Affiche le formulaire de modification
     */
    public function edit(Machine $machine)
    {
        $agences = Agence::all();
        $types = TypeMachine::all();
        $modeles = Modele::with('marque')->where('type', 'machine')->get();

        return view('machines.edit', compact('machine', 'agences', 'types', 'modeles'));
    }

    /**
     * Mettre à jour une machine
     */
    public function update(Request $request, Machine $machine)
    {
        $validated = $request->validate([
            'agence_id' => 'required|exists:agences,id',
            'modele_id' => 'required|exists:modeles,id',
            'type_machine_id' => 'required|exists:type_machines,id',
            'numero_serie' => 'required|unique:machines,numero_serie,'.$machine->id,
            'localisation' => 'required|string',
            'detail_appareil' => 'nullable|string',
            'commentaire' => 'nullable|string'
        ]);

        $machine->update($validated);

        return redirect()->route('machines.index')
            ->with('success', 'Machine mise à jour avec succès.');
    }

    /**
     * Supprime une machine
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect()->route('machines.index')
            ->with('success', 'Machine supprimée avec succès.');
    }
}
