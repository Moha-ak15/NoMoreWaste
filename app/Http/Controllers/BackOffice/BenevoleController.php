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
        $benevole = Benevole::all();
        return view('backoffice.benevoles.index', compact('benevole'));
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
            'date_insription' => 'required|date',

        ]);

        Benevole::create($request->all());
        return redirect()->route('benevoles.index')->with('success', 'Benevole créé avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $benevole = Benevole::findOrFail($id);
        return view('benevoles.show', compact('benevole'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $benevole = Benevole::findOrFail($id);
        return view('backoffice.benevoles.edit', compact('benevole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:benevoles',
            'telephone' => 'required|string|max:20',
            'date_insription' => 'required|date',
        ]);

        $benevole = Benevole::findOrFail($id);
        $benevole->update($request->all());
        return redirect()->route('benevoles.index')->with('success', 'Benevole modifié avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $benevole = Benevole::findOrFail($id);
        $benevole->delete();
        return redirect()->route('benevoles.index')->with('success', 'Benevole supprimé avec succès :)');
    }
}
