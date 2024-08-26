@extends('backoffice.layout')

@section('title', 'Détails du Commercant')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Détails du Commerçant</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Nom de l'entreprise:</strong>
            </div>
            <div class="col-md-8">
                {{ $commercant->entreprise }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Nom du Responsable:</strong>
            </div>
            <div class="col-md-8">
                {{ $commercant->responsable }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Email:</strong>
            </div>
            <div class="col-md-8">
                <a href="mailto:{{ $commercant->email }}">{{ $commercant->email }}</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Téléphone:</strong>
            </div>
            <div class="col-md-8">
                <a href="tel:{{ $commercant->telephone }}">{{ $commercant->telephone }}</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Adresse:</strong>
            </div>
            <div class="col-md-8">
                {{ $commercant->adresse }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Type de Commerce:</strong>
            </div>
            <div class="col-md-8">
                {{ $commercant->type_commercant }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Date d'Adhésion:</strong>
            </div>
            <div class="col-md-8">
                {{ \Carbon\Carbon::parse($commercant->date_adhesion)->format('d/m/Y') }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Date de Renouvellement:</strong>
            </div>
            <div class="col-md-8">
                {{ $commercant->date_renouvellement ? \Carbon\Carbon::parse($commercant->date_renouvellement)->format('d/m/Y') : 'Non applicable' }}
            </div>
        </div>
        <a href="{{ route('commercants.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </div>
</div>

@endsection
