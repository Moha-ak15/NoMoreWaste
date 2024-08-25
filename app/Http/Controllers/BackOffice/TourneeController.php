<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tournee;

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
        return view('backoffice.tournees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'heure' => 'required|string',
            'commercant_id' => 'required|exists:commercants,id',
        ]);

        Tournee::create($request->all());
        return redirect()->route('tournees.index');
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
        return view('backoffice.tournees.edit', compact('tournee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'heure' => 'required|string',
            'commercant_id' => 'required|exists:commercants,id',
        ]);

        $tournee = Tournee::findOrFail($id);
        $tournee->update($request->all());
        return redirect()->route('tournees.index');
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
