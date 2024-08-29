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
    public function index(Request $request)
    {
        $search = $request->input('search');

        $commercants = Commercant::query()
            ->where('entreprise', 'LIKE', "%{$search}%")
            ->orWhere('type_commercant', 'LIKE', "%{$search}%")
            ->orWhere('adresse', 'LIKE', "%{$search}%")
            ->get();

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
            'entreprise' => 'required|string|max:255',
            'responsable' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:commercants',
            'telephone' => 'required|string|max:20',
            'type_commercant' => 'required|string|max:50',
        ]);

        Commercant::create($request->all());
        return redirect()->route('commercants.index')->with('success', 'Commercant créé avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $commercants_id)
    {
        $commercant = Commercant::findOrFail($commercants_id);
        return view('backoffice.commercants.show', compact('commercant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $commercants_id)
    {
        $commercants = Commercant::findOrFail($commercants_id);
        return view('backoffice.commercants.edit', compact('commercants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $commercants_id)
    {
        $commercants = Commercant::findOrFail($commercants_id);

        $request->validate([
            'entreprise' => 'required|string|max:255',
            'responsable' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20|unique:commercants,telephone,' . $commercants->commercant_id . ',commercant_id',
            'type_commercant' => 'required|string|max:50',
        ]);

        $commercants->update($request->except('email'));

        return redirect()->route('commercants.index')->with('success', 'Commerçant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $commercants_id)
    {
        $commercant = Commercant::findOrFail($commercants_id);
        $commercant->delete();
        return redirect()->route('commercants.index')->with('success', 'Commercant supprimé avec succès :)');
    }
}
