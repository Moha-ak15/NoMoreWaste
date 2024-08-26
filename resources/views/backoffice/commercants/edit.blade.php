@extends('backoffice.layout')

@section('title', 'Modifier le Bénévole')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le Bénévole</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('commercants.update', $commercants->commercant_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="entreprise">Entreprise</label>
                <input type="text" name="entreprise" class="form-control" value="{{ $commercants->entreprise }}" required>
            </div>
            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" name="responsable" class="form-control" value="{{ $commercants->responsable }}" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" value="{{ $commercants->adresse }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $commercants->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $commercants->telephone }}" required>
            </div>
            <div class="form-group">
                <label for="type_commercant">Type de Commerçant</label>
                <input type="text" name="type_commercant" class="form-control" value="{{ $commercants->type_commercant }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Enregistrer les modifications</button>
        </form>
    </div>
</div>
@endsection
