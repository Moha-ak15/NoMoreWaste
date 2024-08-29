<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillBenevole;
use App\Models\Benevole;

class SkillBenevoleController extends Controller
{
    public function index()
    {
        // Récupérer toutes les compétences avec les bénévoles associés
        $skillsBenevoles = SkillBenevole::with('benevole')->get();

        // Retourner la vue index avec les compétences
        return view('backoffice.benevoles.skillsbenevole.index', compact('skillsBenevoles'));
    }

    public function create()
    {
        $benevoles = Benevole::all();
        return view('backoffice.benevoles.skillsbenevole.create', compact('benevoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'benevole_id' => 'required|exists:benevoles,benevole_id',
            'competence' => 'required|string|max:255',
        ]);

        SkillBenevole::create($request->all());

        return redirect()->route('skills_benevole.index')->with('success', 'Compétence ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $skillBenevole = SkillBenevole::findOrFail($id);
        $benevoles = Benevole::all();

        return view('backoffice.benevoles.skillsBenevole.edit', compact('skillBenevole', 'benevoles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'benevole_id' => 'required|exists:benevoles,benevole_id',
            'competence' => 'required|string|max:255',
        ]);

        $skillBenevole = SkillBenevole::findOrFail($id);
        $skillBenevole->update($request->all());

        return redirect()->route('skills_benevole.index')->with('success', 'Compétence mise à jour avec succès');
    }

    public function destroy($id)
    {
        $skillBenevole = SkillBenevole::findOrFail($id);
        $skillBenevole->delete();

        return redirect()->route('skills_benevole.index')->with('success', 'Compétence supprimée avec succès');
    }
}
