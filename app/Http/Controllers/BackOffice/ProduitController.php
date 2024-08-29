<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Commercant;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');
        $produits = Produit::where('nom', 'like', "%$search%")
        ->orWhere('categorie', 'like', "%$search%")
        ->get();
        return view("backoffice.produits.index", compact("produits"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commercants = Commercant::all();
        return view('backoffice.produits.create', compact('commercants'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'date_peremption' => 'required|date',
            'quantite' => 'required|integer|min:0',
            'commercant_id' => 'required|exists:commercants,commercant_id',
        ]);

        $code_barre = Str::random(12); //
        Produit::create(array_merge($request->all(), ['code_barre' => $code_barre]));

        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');
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
        $produit = Produit::findOrFail($id);
        $commercants = Commercant::all();
        return view('backoffice.produits.edit', compact('produit', 'commercants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'date_peremption' => 'required|date',
            'quantite' => 'required|integer|min:0',
            'commercant_id' => 'required|exists:commercants,commercant_id',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');

    }
}
