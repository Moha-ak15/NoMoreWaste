<?php
namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Collecte;
use Illuminate\Http\Request;

class CollecteController extends Controller
{
    public function index()
    {
        // Récupérer toutes les collectes programmées
        $collectes = Collecte::where('statut_collecte', 'programmer')->get();
        return view('frontoffice.collectes.index', compact('collectes'));
    }

    public function show($id)
    {
        // Récupérer les détails d'une collecte spécifique
        $collectes = Collecte::findOrFail($id);
        return view('frontoffice.collectes.show', compact('collectes'));
    }

    public function inscription(Request $request, $id)
    {
        // Inscription à une collecte
        $collectes = Collecte::findOrFail($id);

        $user = auth()->user();
        $user->collectes()->attach($collectes->collecte_id);

        return redirect()->route('collectesfront.show', $collectes->collecte_id)
            ->with('success', 'Vous êtes inscrit à cette collecte avec succès. :)');
    }
}
