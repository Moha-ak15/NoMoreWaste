<?php

namespace App\Http\Controllers\BackOffice;
use App\Models\Benevole;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benevoles = Benevole::all();
        return view('backoffice.benevoles.index', compact('benevoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.benevoles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:benevoles',
            'telephone' => 'required|string|max:20',
            'disponibilite' => 'required|string',
        ]);

        Benevole::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'date_inscription' => $request->input('date_inscription'),
            'disponibilite' => $request->input('disponibilite'),
        ]);

        return redirect()->route('benevoles.index')->with('success', 'Bénévole créé avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $benevole_id)
    {
        $benevoles = Benevole::findOrFail($benevole_id);
        return view('backoffice.benevoles.show', compact('benevoles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $benevoles_id)
    {
        $benevoles = Benevole::findOrFail($benevoles_id);
        return view('backoffice.benevoles.edit', compact('benevoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $benevoles_id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:benevoles,email,' . $benevoles_id,
            'telephone' => 'required|string|max:20',
            'date_insription' => 'required|date',
        ]);

        $benevoles = Benevole::findOrFail($benevoles_id);
        $benevoles->update($request->all());
        return redirect()->route('benevoles.index')->with('success', 'Benevole modifié avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $benevoles_id)
    {
        $benevoles = Benevole::findOrFail($benevoles_id);
        $benevoles->delete();
        return redirect()->route('benevoles.index')->with('success', 'Benevole supprimé avec succès :)');
    }
}
