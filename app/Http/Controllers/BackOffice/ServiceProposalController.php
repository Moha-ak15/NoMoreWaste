<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProposal;
use App\Models\Service;

class ServiceProposalController extends Controller
{

    public function index()
    {
        $proposal = ServiceProposal::all();
        return view("backoffice.services.service_proposals.index", compact("proposal"));
    }

    public function create()
    {
        //
    }

    public function approve($id)
    {
        $proposal = ServiceProposal::findOrFail($id);
        $proposal->statut = 'approuvé';
        $proposal->save();

        Service::create([
            'nom' => $proposal->nom,
            'description' => $proposal->description,
            
        ]);

        return redirect()->route('service_proposals.index')->with('success', 'Proposition approuvée avec succès');
    }

    public function reject($id)
    {
        $proposal = ServiceProposal::findOrFail($id);
        $proposal->statut = 'rejeté';
        $proposal->save();

        return redirect()->route('service_proposals.index')->with('success', 'Proposition rejetée avec succès');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        ServiceProposal::create([
            'user_id' => auth()->id(),
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('service_proposals.index')->with('success', 'Proposition de service soumise avec succès');
    }

    public function show(string $id)
    {
        $proposal = ServiceProposal::findOrFail($id);
        return view("backoffice.services.service_proposals.show", compact("proposal"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
