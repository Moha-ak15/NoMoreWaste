<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        return view("backoffice.vehicules.index", compact("vehicules"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backoffice.vehicules.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'statut' => 'required|string',
        ]);

        Vehicule::create($request->all());

        return redirect()->route('vehicules.index')->with('success', 'Véhicule créé avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        return view('vehicules.edit', compact('vehicule'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules,immatriculation,' . $id,
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'statut' => 'required|string',
        ]);

        $vehicule = Vehicule::findOrFail($id);
        $vehicule->update($request->all());

        return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();

        return redirect()->route('vehicules.index')->with('success', 'Véhicule supprimé avec succès :)');
    }
}
