<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Models\Commercant;
use App\Http\Controllers\Controller;

class CommercantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commercants = Commercant::all();
        return view('backoffice.commercants.index', compact('commercants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.commercants.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'non' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:commercants',
            'telephone' => 'required|string|max:20',
        ]);

        Commercant::create($request->all());
        return redirect()->route('commercants.index')->with('success', 'Commercant créé avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commercant = Commercant::findOrFail($id);
        return view('backoffice.commercants.show', compact('commercant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commercant = Commercant::findOrFail($id);
        return view('backoffice.commercants.edit', compact('commercant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'non' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:commercants,email,' . $id,
            'telephone' => 'required|string|max:20',
        ]);

        $commercant = Commercant::findOrFail($id);
        $commercant->update($request->all());
        return redirect()->route('commercants.index')->with('success', 'Commercant modifié avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commercant = Commercant::findOrFail($id);
        $commercant->delete();
        return redirect()->route('commercants.index')->with('success', 'Commercant supprimé avec succès :)');
    }
}
