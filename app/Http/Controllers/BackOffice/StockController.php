<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Produit;

class StockController extends Controller
{

    public function index()
    {
        $stocks = Stock::all();
        return view('backoffice.stocks.index', compact('stocks'));
    }

    public function create()
    {
        $produits = Produit::all();
        return view('backoffice.stocks.create', compact('produits'));
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

    public function show(string $id)
    {
    /*  $stock = Stock::findOrFail($id);
        return view('backoffice.stocks.show', compact('stock')); */
    }

    public function edit(string $id)
    {
        $stock = Stock::findOrFail($id);
        $produits = Produit::all();
        return view('backoffice.stocks.edit', compact('stock', 'produits'));
    }

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

    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock supprimé avec succès :)');
    }
}
