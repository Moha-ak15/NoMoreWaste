@extends('backoffice.layout')

@section('title', 'Modifier le Produit')

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier le Produit</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('produits.update', $produit->produit_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom du Produit</label>
                    <input type="text" name="nom" class="form-control" value="{{ $produit->nom }}" required>
                </div>

                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <input type="text" name="categorie" class="form-control" value="{{ $produit->categorie }}" required>
                </div>

                <div class="form-group">
                    <label for="date_peremption">Date de Péremption</label>
                    <input type="date" name="date_peremption" class="form-control" value="{{ $produit->date_peremption }}" required>
                </div>

                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" name="quantite" class="form-control" value="{{ $produit->quantite }}" min="0" required>
                </div>

                <div class="form-group">
                    <label for="commercant_id">Commerçant</label>
                    <select name="commercant_id" class="form-control" required>
                        @foreach ($commercants as $commercant)
                            <option value="{{ $commercant->commercant_id }}" {{ $produit->commercant_id == $commercant->commercant_id ? 'selected' : '' }}>
                                {{ $commercant->responsable }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Mettre à jour le Produit</button>
            </form>
        </div>
    </div>
@endsection
