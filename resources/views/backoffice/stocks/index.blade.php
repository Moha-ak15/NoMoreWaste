@extends('backoffice.layout')

@section('title', 'Gestion des Stocks')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Liste des Stocks</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('stocks.create') }}" class="btn btn-success mb-3">Ajouter un Stock</a>

            @if ($stocks->isEmpty())
                <p>Aucun stock trouvé.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Produit</th>
                            <th>Quantité Disponible</th>
                            <th>Date d'Entrée en Stock</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $stock->produit->nom }}</td>
                                <td>{{ $stock->quantite_disponible }}</td>
                                <td>{{ $stock->date_entree_stock }}</td>
                                <td class="text-center">
                                    <a href="{{ route('stocks.edit', $stock->stock_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('stocks.destroy', $stock->stock_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce stock ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
