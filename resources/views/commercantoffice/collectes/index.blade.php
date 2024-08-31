@extends('commercantoffice.layout')

@section('title', 'Mes Collectes')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Mes Collectes</h2>

    @if($collectes->isEmpty())
        <p>Aucune collecte disponible.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collectes as $collecte)
                    <tr>
                        <td>{{ $collecte->date_collecte }}</td>
                        <td>{{ $collecte->produit->nom }}</td>
                        <td>{{ $collecte->quantite_collecte }} kg</td>
                        <td><span class="badge bg-primary">{{ ucfirst($collecte->statut_collecte) }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $collectes->links() }}
    @endif
</div>
@endsection
