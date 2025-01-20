@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Liste des Accessoires</h3>
        <a href="{{ route('accessoires.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nouvel Accessoire
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Filtres
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('accessoires.index') }}" class="row g-3">
                <div class="col-md-3">
                    <label for="machine" class="form-label">Machine</label>
                    <select name="machine" id="machine" class="form-select">
                        <option value="">Toutes les machines</option>
                        @foreach($machines as $machine)
                            <option value="{{ $machine->id }}" {{ request('machine') == $machine->id ? 'selected' : '' }}>
                                {{ $machine->numero_serie }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select">
                        <option value="">Tous les types</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="marque" class="form-label">Marque</label>
                    <select name="marque" id="marque" class="form-select">
                        <option value="">Toutes les marques</option>
                        @foreach($modeles->pluck('marque')->unique() as $marque)
                            <option value="{{ $marque->id }}" {{ request('marque') == $marque->id ? 'selected' : '' }}>
                                {{ $marque->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i>Appliquer les filtres</button>
                    <a href="{{ route('accessoires.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i>Réinitialiser</a>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>N° Série</th>
                <th>Type</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Machine associée</th>
                <th>Localisation</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accessoires as $accessoire)
                <tr>
                    <td>{{ $accessoire->numero_serie }}</td>
                    <td>{{ $accessoire->typeAccessoire->nom }}</td>
                    <td>{{ $accessoire->modele->marque->nom }}</td>
                    <td>{{ $accessoire->modele->nom }}</td>
                    <td>
                        @if($accessoire->machine)
                            <a href="{{ route('machines.show', $accessoire->machine) }}">
                                {{ $accessoire->machine->numero_serie }}
                            </a>
                        @else
                            <span class="text-muted">Non assigné</span>
                        @endif
                    </td>
                    <td>{{ $accessoire->localisation }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('accessoires.show', $accessoire) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> Voir
                            </a>
                            <a href="{{ route('accessoires.edit', $accessoire) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('accessoires.destroy', $accessoire) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet accessoire ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $accessoires->links() }}
    </div>
@endsection
