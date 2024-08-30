@extends('backoffice.layout')

@section('title', 'Modifier le Stock')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier le Stock</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('stocks.update', $stock->stock_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="produit_id">Produit</label>
                    <select name="produit_id" class="form-control" required>
                        @foreach ($produits as $produit)
                            <option value="{{ $produit->produit_id }}" {{ $stock->produit_id == $produit->produit_id ? 'selected' : '' }}>
                                {{ $produit->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantite_disponible">Quantité Disponible</label>
                    <input type="number" name="quantite_disponible" class="form-control" value="{{ $stock->quantite_disponible }}" min="1" required>
                </div>

                <div class="form-group">
                    <label for="date_entree_stock">Date d'Entrée en Stock</label>
                    <input type="date" name="date_entree_stock" class="form-control" value="{{ $stock->date_entree_stock }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Mettre à jour le Stock</button>
            </form>
        </div>
    </div>
</div>
@endsection
