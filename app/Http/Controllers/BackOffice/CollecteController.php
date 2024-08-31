<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Models\Collecte;
use App\Http\Controllers\Controller;
use App\Models\Commercant;
use App\Models\Produit;
use App\Models\Benevole;
use App\Models\Vehicule;
class CollecteController extends Controller
{
    public function index(Request $request, Commercant $commercants)
    {
        $query = Collecte::with('commercant', 'benevoles', 'vehicules')
        ->where('commercant_id', $commercants->commercant_id);

        if ($request->filled('statut_collecte')) {
            $query->where('statut_collecte', $request->statut_collecte);
        }

        if ($request->filled('date_collecte')) {
            $query->whereDate('date_collecte', $request->date_collecte);
        }

        $collectes = $query->orderBy('date_collecte', 'desc')->paginate(10);

        return view('backoffice.collectes.index', compact('collectes', 'commercants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commercants = Commercant::all();
        $produits = Produit::all();
        $benevoles = Benevole::all();
        $vehicules = Vehicule::all();

        return view('backoffice.collectes.create', compact('commercants', 'produits', 'benevoles', 'vehicules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_collecte' => 'required|date',
            'commercant_id' => 'required|exists:commercants,commercant_id',
            'produit_id' => 'required|exists:produits,produit_id',
            'quantite_collectee' => 'required|integer|min:1',
            'benevoles' => 'required|array',
            'benevoles.*' => 'exists:benevoles,benevole_id',
            'vehicules' => 'required|array',
            'vehicules.*' => 'exists:vehicules,vehicule_id',

        ]);

        $collecte = Collecte::create([
            'date_collecte' => $request['date_collecte'],
            'commercant_id' => $request['commercant_id'],
            'produit_id' => $request['produit_id'],
            'quantite_collectee' => $request['quantite_collectee'],
        ]);
        $collecte->benevoles()->attach($request->benevoles);
        $collecte->vehicules()->attach($request->vehicules);

        return redirect()->route('collectes.index')->with('success', 'Collecte créée avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $collecte_id)
    {
        $collectes = Collecte::findOrFail($collecte_id);
        return view('backoffice.collectes.show', compact('collecte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $collecte_id)
    {
        $collecte = Collecte::findOrFail($collecte_id);
        return view('backoffice.collectes.edit', compact('collecte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $collecte_id)
    {
        $request->validate([
            'date_collecte' => 'required|date',
            'commercant_id' => 'required|exists:commercants,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite_collectee' => 'required|integer|min:1',
        ]);

        $collecte = Collecte::findOrFail($collecte_id);
        $collecte->update([
            'date_collecte' => $request['date_collecte'],
            'commercant_id' => $request['commercant_id'],
            'produit_id' => $request['produit_id'],
            'quantite_collectee' => $request['quantite_collectee'],
        ]);
        return redirect()->route('collectes.index')->with('success', 'Collecte modifiée avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $collecte_id)
    {
        $collecte = Collecte::findOrFail($collecte_id);
        $collecte->delete();
        return redirect()->route('collectes.index')->with('success', 'Collecte supprimée avec succès :)');
    }
}
