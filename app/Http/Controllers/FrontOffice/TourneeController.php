<?php
namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Tournee;
use Illuminate\Http\Request;

class TourneeController extends Controller
{
    public function index()
    {
        // Récupérer toutes les tournées disponibles
        $tournees = Tournee::all();
        return view('frontoffice.tournees.index', compact('tournees'));
    }

    public function show($id)
    {
        // Récupérer les détails d'une tournée spécifique
        $tournees = Tournee::findOrFail($id);
        return view('frontoffice.tournees.show', compact('tournees'));
    }

    public function inscription(Request $request, $id)
    {
        // Inscription à une tournée
        $tournees = Tournee::findOrFail($id);

        $user = auth()->user();
        if (!$user->tournees->contains($tournees->tournee_id)) {
            $user->tournees()->attach($tournees->tournee_id);
        }

        return redirect()->route('tourneesfront.show', $tournees->tournee_id)
            ->with('success', 'Vous êtes inscrit à cette tournée avec succès.');
    }
}
