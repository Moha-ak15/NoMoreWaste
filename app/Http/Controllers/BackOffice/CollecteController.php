<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Models\Collecte;
use App\Http\Controllers\Controller;
class CollecteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectes = Collecte::all();
        return view('backoffice.collectes.index', compact('collectes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.collectes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_collecte' => 'required|date',
            'commercant_id' => 'required|exists:commercants,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite_collecte' => 'required|integer|min:1',

        ]);

        Collecte::create([
            'date_collecte' => $request['date_collecte'],
            'commercant_id' => $request['commercant_id'],
            'produit_id' => $request['produit_id'],
            'quantite_collecte' => $request['quantite_collecte'],
        ]);
        return redirect()->route('collectes.index')->with('success', 'Collecte créée avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collecte = Collecte::findOrFail($id);
        return view('backoffice.collectes.show', compact('collecte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collecte = Collecte::findOrFail($id);
        return view('backoffice.collectes.edit', compact('collecte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date_collecte' => 'required|date',
            'commercant_id' => 'required|exists:commercants,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite_collecte' => 'required|integer|min:1',
        ]);

        $collecte = Collecte::findOrFail($id);
        $collecte->update([
            'date_collecte' => $request['date_collecte'],
            'commercant_id' => $request['commercant_id'],
            'produit_id' => $request['produit_id'],
            'quantite_collecte' => $request['quantite_collecte'],
        ]);
        return redirect()->route('collectes.index')->with('success', 'Collecte modifiée avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collecte = Collecte::findOrFail($id);
        $collecte->delete();
        return redirect()->route('collectes.index')->with('success', 'Collecte supprimée avec succès :)');
    }
}
