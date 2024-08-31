<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Commercant;
use App\Models\Tournee;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();  // Récupère tous les services
        $commercants = Commercant::all();  // Récupère tous les commerçants
        $tournees = Tournee::all();  // Récupère toutes les tournées

        return view('frontoffice.home', compact('services', 'commercants', 'tournees'));
    }
}
