<?php
namespace App\Http\Controllers\CommercantOffice;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commercant;
use Illuminate\Support\Facades\Hash;

class CommercantController extends Controller
{
    public function dashboard()
    {
        $commercant = Auth::user()->commercant;

        if (!$commercant) {
            return redirect()->route('home')->with('error', 'Vous n\'êtes pas associé à un commerçant.');
        }

        $collectes = $commercant->collectes()->orderBy('date_collecte', 'desc')->take(5)->get();

        return view('commercantoffice.dashboard', compact('commercant', 'collectes'));
    }

    public function registrationForm()
    {
        return view('commercantoffice.inscription-commercant');
    }

    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'entreprise' => 'required|string|max:255',
            'responsable' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|string|max:15',
            'type_commercant' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->responsable,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assigner le rôle de commerçant à l'utilisateur
        $user->assignRole('commercant');

        // Création du commerçant
        Commercant::create([
            'entreprise' => $request->entreprise,
            'responsable' => $request->responsable,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'type_commercant' => $request->type_commercant,
            'date_adhesion' => now(),
            'date_renouvellement' => now()->addYear(),
            'user_id' => $user->id,
        ]);

        // Redirection après inscription
        return redirect()->route('login')->with('success', 'Votre compte commerçant a été créé avec succès. Vous pouvez maintenant vous connecter.');
    }


    public function collectes()
    {
        $commercant = Auth::user()->commercant;

        $collectes = $commercant->collectes()->orderBy('date_collecte', 'desc')->get();

        dd($collectes); // Affiche les collectes pour vérifier ce qui est récupéré

        return view('commercant.collectes.index', compact('collectes'));
    }


    public function profile()
    {
        $commercant = Auth::user()->commercant;

        return view('commercant.profile', compact('commercant'));
    }

    public function updateProfile(Request $request)
    {
        $commercant = Auth::user()->commercant;

        $request->validate([
            'entreprise' => 'required|string|max:255',
            'responsable' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
        ]);

        $commercant->update($request->only('entreprise', 'responsable', 'adresse', 'telephone'));

        return redirect()->route('commercant.profile')->with('success', 'Profil mis à jour avec succès.');
    }
}
