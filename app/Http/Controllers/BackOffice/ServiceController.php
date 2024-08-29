<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('backoffice.services.index', compact('services'));
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

        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service créé avec succès :)');
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
        $service->update($request->all());
        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès :)');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès');
    }
}
