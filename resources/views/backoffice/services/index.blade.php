@extends('backoffice.layout')

@section('title', 'Liste des Services')

@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <h4 class="mb-0 d-flex align-items-center">Propositions de Services</h4>
                    <a href="{{ route('services.create') }}" class="btn btn-success">Ajouter un Service</a>
                    <a href="{{ route('service_proposals.index') }}" class="btn btn-light">Voir les Propositions</a>
                    <a href="{{ route('service_plannings.index') }}" class="btn btn-dark">Voir le Planning</a>
                </div>
                <div class="card-body">
                    @if ($services->isEmpty())
                        <p class="text-center">Aucune proposition trouvée.</p>
                    @else
                        <div class="row">
                            @foreach($services as $service)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $service->nom }}</h5>
                                            <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                                        </div>
                                        <div class="card-footer bg-transparent text-right">
                                            <a href="{{ route('services.show', $service->service_id) }}" class="btn btn-info btn-sm">Voir</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Liste des Services</h4>
                </div>
                <div class="card-body">
                    @if ($proposals->isEmpty())
                        <p class="text-center">Aucun service trouvé.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Proposeur</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <td>{{ $proposal->nom }}</td>
                                            <td>{{ $proposal->user->name ?? 'Utilisateur inconnu' }}</td>
                                            <td>
                                            <span class="badge
                                                @if($proposal->statut == 'en attente') bg-warning text-dark
                                                @elseif($proposal->statut == 'approuvé') bg-success
                                                @else bg-danger @endif">
                                                {{ ucfirst($proposal->statut) }}
                                            </span>

                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('service_proposals.show', $proposal->proposal_id) }}" class="btn btn-info btn-sm mr-2">Voir</a>
                                                @if($proposal->statut == 'en attente')
                                                    <form action="{{ route('service_proposals.approve', $proposal->proposal_id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm mr-2">Approuver</button>
                                                    </form>
                                                    <form action="{{ route('service_proposals.reject', $proposal->proposal_id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
