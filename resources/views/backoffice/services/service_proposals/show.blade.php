@extends('backoffice.layout')

@section('title', 'Détails de la Proposition')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Détails de la Proposition</h4>
        </div>
        <div class="card-body">
            <p><strong>Nom : </strong>{{ $proposal->nom }}</p>
            <p><strong>Proposeur : </strong>{{ $proposal->proposeur }}</p>
            <p><strong>Description : </strong>{{ $proposal->description }}</p>
            <p><strong>Statut : </strong>{{ ucfirst($proposal->statut) }}</p>
        </div>
        <div class="card-footer text-right">
            @if($proposal->statut == 'en attente')
                <form action="{{ route('service_proposals.approve', $proposal->proposal_id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm" title="Approuver">
                        ✅
                    </button>
                </form>

                <form action="{{ route('service_proposals.reject', $proposal->proposal_id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" title="Rejeter">
                        ❌
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
