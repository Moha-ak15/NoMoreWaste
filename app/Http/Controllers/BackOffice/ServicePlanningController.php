<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePlanning;
use App\Models\Service;

class ServicePlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plannings = ServicePlanning::with('service')->get();
        return view('backoffice.services.service_plannings.index', compact('plannings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('backoffice.services.service_plannings.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,service_id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'lieu' => 'required|string|max:255',
        ]);

        ServicePlanning::create($request->all());
        return redirect()->route('service_plannings.index')->with('success','Planification du service créée avec succès :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plannings = ServicePlanning::findOrFail($id);
        $services = Service::all();
        return view('backoffice.services.service_plannings.show', compact('plannings', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plannings = ServicePlanning::findOrFail($id);
        $services = Service::all();
        return view('backoffice.services.service_plannings.edit', compact('plannings', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,service_id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'lieu' => 'required|string|max:255',
        ]);

        $plannings = ServicePlanning::findOrFail($id);
        $plannings->update($request->all());
        return redirect()->route('service_plans.index')->with('success', 'Planification de service mise à jour avec succès :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plannings = ServicePlanning::findOrFail($id);
        $plannings->delete();
        return redirect()->route('service_plannings.index')->with('success', 'Planification de service supprimée avec succès :)');
    }
}
