<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('backoffice.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,produit_id',
            'quantite_disponible' => 'required|integer|min:1',
            'date_entree_stock' => 'required|date',
        ]);

        Stock::create([
            'produit_id' => $request['produit_id'],
            'quantite_disponible' => $request['quantite_disponible'],
            'date_entree_stock' => $request['date_entree_stock'],
        ]);
        return redirect()->route('stocks.index')->with('success', 'Stock créé avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = Stock::findOrFail($id);
        return view('backoffice.stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stock = Stock::findOrFail($id);
        return view('backoffice.stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,produit_id',
            'quantite_disponible' => 'required|integer|min:1',
            'date_entree_stock' => 'required|date',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update([
            'produit_id' => $request['produit_id'],
            'quantite_disponible' => $request['quantite_disponible'],
            'date_entree_stock' => $request['date_entree_stock'],
        ]);
        return redirect()->route('stocks.index')->with('success', 'Stock modifié avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock supprimé avec succès :)');
    }
}
