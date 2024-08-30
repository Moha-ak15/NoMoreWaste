@extends('backoffice.layout')

@section('title', 'Propositions de Services')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Propositions de Services</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($proposal->isEmpty())
                <p>Aucune proposition trouvée.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Proposeur</th>
                            <th>Statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proposal as $proposal)
                        <tr>
                            <td>{{ $proposal->nom }}</td>
                            <td>{{ $proposal->user->name ?? 'Utilisateur inconnu' }}</td>
                            <td>{{ ucfirst($proposal->statut) }}</td>
                            <td class="text-center">
                                <a href="{{ route('service_proposals.show', $proposal->proposal_id) }}" class="btn btn-outline-info btn-sm" title="Voir">
                                    🔎
                                </a>
                                @if($proposal->statut == 'en attente')
                                    <form action="{{ route('service_proposals.approve', $proposal->proposal_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm" title="Approuver">
                                            ✅
                                        </button>
                                    </form>
                                    <form action="{{ route('service_proposals.reject', $proposal->proposal_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Rejeter">
                                            ❌
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
