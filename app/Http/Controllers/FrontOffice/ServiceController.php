<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('frontoffice.services.index', compact('services'));
    }

    public function show($id)
    {
        $services = Service::with('plannings')->findOrFail($id);
        return view('frontoffice.services.show', compact('services'));
    }

    public function inscription(Request $request, $id)
    {
        $services = Service::findOrFail($id);

        $user = auth()->user();
        $user->services()->attach($services->service_id);

        return redirect()->route('servicesfront.show', $services->service_id)
            ->with('success', 'Vous êtes inscrit à ce service avec succès.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
