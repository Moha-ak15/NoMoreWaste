<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Commercant;
use App\Models\Tournee;
use App\Models\Collecte;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $commercants = Commercant::all();
        $tournees = Tournee::all();
        $collectes = Collecte::all();

        return view('frontoffice.home', compact('services', 'commercants', 'tournees', 'collectes'));
    }
}
