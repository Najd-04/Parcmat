@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Liste des Machines</h3>
            <a href="{{ route('machines.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouvelle Machine
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Filtres</h5>
            </div>
            <div class="card-body">
                <form id="filter-form" action="{{ route('machines.index') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <!--<label for="agence" class="form-label">Agence</label>-->
                            <select name="agence" id="agence" class="form-select filter-select">
                                <option value="">Toutes les agences</option>
                                @foreach($agences as $agence)
                                    <option
                                        value="{{ $agence->id }}" {{ request('agence') == $agence->id ? 'selected' : '' }}>
                                        {{ $agence->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!--<label for="type" class="form-label">Type</label>-->
                            <select name="type" id="type" class="form-select filter-select">
                                <option value="">Tous les types</option>
                                @foreach($types as $type)
                                    <option
                                        value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                        {{ $type->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!--<label for="marque" class="form-label">Marque</label>-->
                            <select name="marque" id="marque" class="form-select filter-select">
                                <option value="">Toutes les marques</option>
                                @foreach($modeles->pluck('marque')->unique() as $marque)
                                    <option
                                        value="{{ $marque->id }}" {{ request('marque') == $marque->id ? 'selected' : '' }}>
                                        {{ $marque->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!--<label for="search" class="form-label">Recherche</label>-->
                            <input type="text" name="search" id="search" class="form-control"
                                   placeholder="Rechercher..." value="{{ request('search') }}">
                        </div>

                        <div class="col-12">
                            <a href="{{ route('machines.index') }}" class="btn btn-secondary">
                                <i class="fas fa-undo"></i> Réinitialiser
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="machines-table">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>N° Série</th>
                                <th>Agence</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Type</th>
                                <th>Localisation</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($machines as $machine)
                                <tr>
                                    <td>{{ $machine->numero_serie }}</td>
                                    <td>{{ $machine->agence->nom }}</td>
                                    <td>{{ $machine->modele->marque->nom }}</td>
                                    <td>{{ $machine->modele->nom }}</td>
                                    <td>{{ $machine->typeMachine->nom }}</td>
                                    <td>{{ $machine->localisation }}</td>
                                    <td>
                                        <div class="d-flex gap-1"> <!-- Utilisation de flexbox avec un petit espace -->
                                            <a href="{{ route('machines.show', $machine) }}"
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Voir
                                            </a>
                                            <a href="{{ route('machines.edit', $machine) }}"
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Modifier
                                            </a>
                                            <form action="{{ route('machines.destroy', $machine) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn">
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

                    <div class="d-flex justify-content-center mt-4">
                        {{ $machines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
