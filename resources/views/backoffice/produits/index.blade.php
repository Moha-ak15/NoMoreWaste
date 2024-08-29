@extends('backoffice.layout')

@section('title', 'Liste des Produits')

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Produits</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('produits.index') }}" method="GET" class="form-inline mb-4">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Recherche</label>
                    <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, type, adresse..." value="{{ request()->input('search') }}">
                    <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
                </div>
            </form>

            <a href="{{ route('produits.create') }}" class="btn btn-success mb-2">Ajouter un Produit</a>

            @if ($produits->isEmpty())
                <p>Aucun produit trouvé.</p>
            @else
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Code Barre</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Date de Péremption</th>
                            <th>Quantité</th>
                            <th>Commerçant</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $produit)
                            <tr>
                                <td>{{ $produit->code_barre }}</td>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->categorie }}</td>
                                <td>{{ $produit->date_peremption }}</td>
                                <td>{{ $produit->quantite }}</td>
                                <td>{{ $produit->commercant->responsable }}</td>
                                <td class="text-center">
                                    <a href="{{ route('produits.edit', $produit->produit_id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('produits.destroy', $produit->produit_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
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
