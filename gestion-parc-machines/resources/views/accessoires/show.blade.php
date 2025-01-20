@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Détails de l'Accessoire</h1>
            <div>
                <a href="{{ route('accessoires.edit', $accessoire) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <a href="{{ route('accessoires.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                Informations principales
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Numéro de série:</strong> {{ $accessoire->numero_serie }}</p>
                        <p><strong>Type:</strong> {{ $accessoire->typeAccessoire->nom }}</p>
                        <p><strong>Marque:</strong> {{ $accessoire->modele->marque->nom }}</p>
                        <p><strong>Modèle:</strong> {{ $accessoire->modele->nom }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Localisation:</strong> {{ $accessoire->localisation }}</p>
                        <p>
                            <strong>Machine associée:</strong>
                            @if($accessoire->machine)
                                <a href="{{ route('machines.show', $accessoire->machine) }}">
                                    {{ $accessoire->machine->numero_serie }}
                                </a>
                            @else
                                <span class="text-muted">Non assigné</span>
                            @endif
                        </p>
                        <p><strong>Créé le:</strong> {{ $accessoire->created_at->format('d/m/Y') }}</p>
                        <p><strong>Mis à jour le:</strong> {{ $accessoire->updated_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($accessoire->detail || $accessoire->commentaire)
            <div class="card">
                <div class="card-header">
                    Détails et commentaires
                </div>
                <div class="card-body">
                    @if($accessoire->detail)
                        <div class="mb-3">
                            <h5>Détails</h5>
                            <p class="mb-4">{{ $accessoire->detail }}</p>
                        </div>
                    @endif

                    @if($accessoire->commentaire)
                        <div>
                            <h5>Commentaires</h5>
                            <p class="mb-0">{{ $accessoire->commentaire }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <div class="mt-4">
            <form action="{{ route('accessoires.destroy', $accessoire) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet accessoire ?')">
                    <i class="fas fa-trash"></i> Supprimer l'accessoire
                </button>
            </form>
        </div>
    </div>
@endsection
