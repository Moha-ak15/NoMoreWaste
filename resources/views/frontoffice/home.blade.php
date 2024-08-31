@extends('frontoffice.layout')

@section('title', 'Accueil')

@section('content')
<div class="container">
    <h1 class="text-center my-5 fs-1">Bienvenue sur NO MORE WASTE</h1>
    <p class="text-center mb-5 fs-3">Découvrez nos services, nos collectes, et nos tournées.</p>

    <!-- Section des services -->
    <section id="services" class="mb-5">
        <h2 class="mb-4 fs-4">Nos Services</h2>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm h-100 border-0 rounded">

                        <div class="card-header bg-primary text-white text-center">
                            <i class="fas fa-concierge-bell fa-2x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mt-3">{{ $service->nom }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($service->description, 100) }}</p>
                            <a href="{{ route('servicesfront.show', $service->service_id) }}" class="btn btn-outline-primary mt-auto">
                                <i class="fas fa-info-circle"></i> Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($services->isEmpty())
        <p class="text-center text-muted">Aucun services n'est programmée pour le moment.</p>
    @endif
    </section>

    <!-- Section des collectes -->
    <section id="collectes" class="mb-5">
        <h2 class="mb-4 fs-4">Collectes Programmées</h2>
        <div class="row">
            @foreach($collectes as $collecte)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm h-100 border-0 rounded">

                        <div class="card-header bg-warning text-white text-center">
                            <i class="fas fa-truck fa-2x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mt-3">Collecte du {{ \Carbon\Carbon::parse($collecte->date_collecte)->format('d/m/Y') }}</h5>
                            <p class="card-text text-muted">
                                <strong>Statut :</strong> {{ ucfirst($collecte->statut_collecte) }} <br>
                                <strong>Quantité à Collecter :</strong> {{ $collecte->quantite_collectee }} kg
                            </p>
                            <a href="{{ route('collectesfront.show', $collecte->collecte_id) }}" class="btn btn-outline-warning mt-auto">
                                <i class="fas fa-info-circle"></i> Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($collectes->isEmpty())
            <p class="text-center text-muted">Aucune collecte n'est programmée pour le moment.</p>
        @endif
    </section>



    <!-- Section des tournées -->
    <section id="tournees" class="mb-5">
        <h2 class="mb-4 fs-4">Nos Tournées</h2>
        <div class="row">
            @foreach($tournees as $tournee)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm h-100 border-0 rounded">
                        <div class="card-header bg-success text-white text-center">
                            <i class="fas fa-route fa-2x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mt-3">Destination : {{ $tournee->destination }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Par : {{ $tournee->responsable }}</h6>
                            <p class="card-text text-muted">Le : {{ $tournee->date_tournee }}</p>
                            <a href="{{ route('tourneesfront.show', $tournee->tournee_id) }}" class="btn btn-outline-success mt-auto">
                                <i class="fas fa-info-circle"></i> Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($tournees->isEmpty())
        <p class="text-center text-muted">Aucune tournées n'est programmée pour le moment.</p>
    @endif
    </section>
</div>

@endsection
     <!-- Section des commerçants -->
        {{-- <section id="commercants" class="mb-5">
            <h2 class="text-center mb-4">Nos Commerçants</h2>
            <div class="row">
                @foreach($commercants as $commercant)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $commercant->responsable }}</h5>
                                <p class="card-text">{{ $commercant->type_commercant }}</p>
                                <a href="{{ route('commercantsfront.show', $commercant->commercant_id) }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section> --}}
