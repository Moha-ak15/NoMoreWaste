@extends('backoffice.layout')

@section('title', 'Modifier la Tournée')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier la Tournée</h4>
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

            <form action="{{ route('tournees.update', $tournee->tournee_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="date_tournee">Date de la Tournée</label>
                    <input type="date" name="date_tournee" class="form-control" value="{{ $tournee->date_tournee }}" required>
                </div>

                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" name="destination" class="form-control" value="{{ $tournee->destination }}" required>
                </div>

                <div class="form-group">
                    <label for="responsable">Responsable</label>
                    <input type="text" name="responsable" class="form-control" value="{{ $tournee->responsable }}" required>
                </div>

                <div class="form-group">
                    <label for="benevoles">Sélectionner les Bénévoles</label>
                    <select name="benevoles[]" class="form-control" multiple>
                        @foreach ($benevoles as $benevole)
                            <option value="{{ $benevole->benevole_id }}" {{ in_array($benevole->benevole_id, $tourneeBenevoles ?? []) ? 'selected' : '' }}>
                                {{ $benevole->nom }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Command (Mac) pour sélectionner plusieurs bénévoles.</small>
                </div>

                <div class="form-group">
                    <label for="stocks">Sélectionner les Stocks</label>
                    <select name="stocks[]" class="form-control" multiple>
                        @foreach ($stocks as $stock)
                            <option value="{{ $stock->stock_id }}" {{ in_array($stock->stock_id, $tourneeStocks ?? []) ? 'selected' : '' }}>
                                {{ $stock->produit->nom }} - {{ $stock->quantite_disponible }} disponibles
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Maintenez Ctrl (Windows) ou Command (Mac) pour sélectionner plusieurs stocks.</small>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Mettre à jour la Tournée</button>
            </form>
        </div>
    </div>
</div>
@endsection
