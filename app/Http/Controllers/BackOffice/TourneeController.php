<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tournee;
use App\Models\Benevole;
use App\Models\Stock;

class TourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournees = Tournee::all();
        return view('backoffice.tournees.index', compact('tournees'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $benevoles = Benevole::all();
        $stocks = Stock::all();
        return view('backoffice.tournees.create', compact('benevoles', 'stocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_tournee' => 'required|date',
            'destination' => 'required|string',
            'responsable' => 'required|string',
            'stocks' => 'required|array',
            'benevoles' => 'required|array',
        ]);

        $tournee = Tournee::create($request->only('date_tournee', 'destination', 'responsable'));

        // Associer les stocks et les bénévoles
        $tournee->stocks()->attach($request->stocks);
        $tournee->benevoles()->attach($request->benevoles);

        return redirect()->route('tournees.index')->with('success', 'Tournée créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tournee = Tournee::findOrFail($id);
        return view('backoffice.tournees.show', compact('tournee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tournee = Tournee::findOrFail($id);
        $benevoles = Benevole::all();
        $stocks = Stock::all();
        return view('backoffice.tournees.edit', compact('tournee', 'benevoles', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_tournee' => 'required|date',
            'destination' => 'required|string',
            'responsable' => 'required|string',
            'stocks' => 'required|array',
            'benevoles' => 'required|array',
        ]);

        $tournee = Tournee::findOrFail($id);
        $tournee->update($request->only('date_tournee', 'destination', 'responsable'));

        // Synchroniser les stocks et les bénévoles
        $tournee->stocks()->sync($request->stocks);
        $tournee->benevoles()->sync($request->benevoles);

        return redirect()->route('tournees.index')->with('success', 'Tournée mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tournee = Tournee::findOrFail($id);
        $tournee->delete();
        return redirect()->route('tournees.index');
    }
}
