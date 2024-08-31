@extends('frontoffice.layout')

@section('title', 'Accueil')

@section('content')
    <div class="container">
        <h1 class="text-center my-5 fs-1">Bienvenue sur NO MORE WASTE</h1>
        <p class="text-center mb-5 fs-3">Découvrez nos services, nos commerçants, et nos tournées.</p>

        <!-- Section des services -->
        <section id="services" class="mb-5">
            <h2 class="text-center mb-4">Nos Services</h2>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->nom }}</h5>
                                <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                                <a href="{{ route('servicesfront.show', $service->service_id) }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

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

        <!-- Section des tournées -->
        <section id="tournees" class="mb-5">
            <h2 class="text-center mb-4">Nos Tournées</h2>
            <div class="row">
                @foreach($tournees as $tournee)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Destination : {{ $tournee->destination }}</h5>
                                <h5 class="card-title">Par : {{ $tournee->responsable }}</h5>
                                <h5 class="card-title">Le : {{ $tournee->date_tournee }}</h5>
                                <p class="card-text">{{ Str::limit($tournee->description, 100) }}</p>
                                <a href="{{ route('tourneesfront.show', $tournee->tournee_id) }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
