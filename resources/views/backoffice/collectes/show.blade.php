<!-- resources/views/backoffice/collectes/show.blade.php -->

@extends('layouts.backoffice')

@section('content')
<div class="card">
    <div class="card-header">
        Bénévoles associés
    </div>
    <div class="card-body">
        <ul>
            @foreach($collecte->benevoles as $benevole)
                <li>{{ $benevole->nom }} - {{ $benevole->competences }}</li>
            @endforeach
        </ul>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        Véhicules associés
    </div>
    <div class="card-body">
        <ul>
            @foreach($collecte->vehicules as $vehicule)
                <li>{{ $vehicule->marque }} - {{ $vehicule->immatriculation }} - Capacité: {{ $vehicule->capacite }} kg</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
