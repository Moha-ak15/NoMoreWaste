@extends('backoffice.layout')

@section('title', 'Modifier le Service')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Modifier le Service</h4>
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

            <form action="{{ route('services.update', $service->service_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $service->nom }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ $service->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Mettre à jour le Service</button>
            </form>
        </div>
    </div>
</div>
@endsection
