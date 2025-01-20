@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Détails de la Machine</h1>
            <div>
                <a href="{{ route('machines.edit', $machine) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <a href="{{ route('machines.index') }}" class="btn btn-secondary">
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
                        <p><strong>Numéro de série:</strong> {{ $machine->numero_serie }}</p>
                        <p><strong>Agence:</strong> {{ $machine->agence->nom }}</p>
                        <p><strong>Marque:</strong> {{ $machine->modele->marque->nom }}</p>
                        <p><strong>Modèle:</strong> {{ $machine->modele->nom }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Type:</strong> {{ $machine->typeMachine->nom }}</p>
                        <p><strong>Localisation:</strong> {{ $machine->localisation }}</p>
                        <p><strong>Créée le:</strong> {{ $machine->created_at->format('d/m/Y') }}</p>
                        <p><strong>Mise à jour le:</strong> {{ $machine->updated_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($machine->detail_appareil || $machine->commentaire)
            <div class="card mb-4">
                <div class="card-header">
                    Détails et commentaires
                </div>
                <div class="card-body">
                    @if($machine->detail_appareil)
                        <div class="mb-3">
                            <h5>Détails de l'appareil</h5>
                            <p>{{ $machine->detail_appareil }}</p>
                        </div>
                    @endif

                    @if($machine->commentaire)
                        <div>
                            <h5>Commentaires</h5>
                            <p>{{ $machine->commentaire }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Accessoires associés</span>
                <a href="{{ route('accessoires.create', ['machine_id' => $machine->id]) }}"
                   class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Ajouter un accessoire
                </a>
            </div>
            <div class="card-body">
                @if($machine->accessoires->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>N° Série</th>
                                <th>Type</th>
                                <th>Modèle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($machine->accessoires as $accessoire)
                                <tr>
                                    <td>{{ $accessoire->numero_serie }}</td>
                                    <td>{{ $accessoire->typeAccessoire->nom }}</td>
                                    <td>{{ $accessoire->modele->nom }}</td>
                                    <td>
                                        <a href="{{ route('accessoires.show', $accessoire) }}"
                                           class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Voir
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted mb-0">Aucun accessoire associé à cette machine.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
