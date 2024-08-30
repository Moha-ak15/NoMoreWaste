<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceProposal;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $proposals = ServiceProposal::all();
        return view('backoffice.services.index', compact('services', 'proposals'));
    }

    public function create()
    {
        return view('backoffice.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        dd($request->all());

        ServiceProposal::create([
            'user_id' => auth()->id(),
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('service_proposals.index')->with('success', 'Proposition de service soumise avec succès');
    }

    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backoffice.services.show', compact('service'));
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('backoffice.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès :)');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès');
    }
}
