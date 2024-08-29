@extends('backoffice.layout')

@section('title', 'Ajouter un Produit')

@section('content')
<div class="container my-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter un Produit</h4>
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

            <form action="{{ route('produits.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom">Nom du Produit</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <input type="text" name="categorie" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="date_peremption">Date de Péremption</label>
                    <input type="date" name="date_peremption" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" name="quantite" class="form-control" min="0" required>
                </div>

                <div class="form-group">
                    <label for="commercant_id">Commerçant</label>
                    <select name="commercant_id" class="form-control" required>
                        @foreach ($commercants as $commercant)
                            <option value="{{ $commercant->commercant_id }}">{{ $commercant->responsable }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Ajouter le Produit</button>
            </form>
        </div>
    </div>
</div>
@endsection
