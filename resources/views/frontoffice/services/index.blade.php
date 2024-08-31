@extends('frontoffice.layout')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 fs-3">Nos Services Disponibles</h2>
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card mb-4 shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <h5 class="card-title">{{ $service->nom }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($service->description, 80) }}</p>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('servicesfront.show', $service->service_id) }}" class="btn btn-outline-primary btn-sm w-100">
                                <i class="fas fa-info-circle"></i> Voir les Détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
