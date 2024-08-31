@section('title', 'Inscription Commerçant')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Inscription Commerçant</h2>

    <form action="{{ route('commercantfront.register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="entreprise" class="form-label">Nom de l'Entreprise</label>
            <input type="text" class="form-control" id="entreprise" name="entreprise" value="{{ old('entreprise') }}" required>
        </div>

        <div class="mb-3">
            <label for="responsable" class="form-label">Nom du Responsable</label>
            <input type="text" class="form-control" id="responsable" name="responsable" value="{{ old('responsable') }}" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
        </div>

        <div class="mb-3">
            <label for="type_commercant" class="form-label">Type de Commerçant</label>
            <input type="text" class="form-control" id="type_commercant" name="type_commercant" value="{{ old('type_commercant') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le Mot de Passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">S'inscrire</button>
    </form>
</div>
@endsection
