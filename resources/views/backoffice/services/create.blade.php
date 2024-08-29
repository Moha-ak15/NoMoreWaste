@extends('backoffice.layout')

@section('title', 'Ajouter un Service')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter un Service</h4>
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

            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter le Service</button>
            </form>
        </div>
    </div>
</div>
@endsection
