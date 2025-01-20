@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier l'Accessoire</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('accessoires.update', $accessoire) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="numero_serie" class="form-label">Numéro de série</label>
                        <input type="text" class="form-control @error('numero_serie') is-invalid @enderror"
                               id="numero_serie" name="numero_serie"
                               value="{{ old('numero_serie', $accessoire->numero_serie) }}" required>
                        @error('numero_serie')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="machine_id" class="form-label">Machine associée</label>
                        <select class="form-select @error('machine_id') is-invalid @enderror"
                                id="machine_id" name="machine_id">
                            <option value="">Aucune machine</option>
                            @foreach($machines as $machine)
                                <option value="{{ $machine->id }}"
                                    {{ (old('machine_id', $accessoire->machine_id) == $machine->id) ? 'selected' : '' }}>
                                    {{ $machine->numero_serie }} - {{ $machine->modele->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('machine_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_accessoire_id" class="form-label">Type d'accessoire</label>
                        <select class="form-select @error('type_accessoire_id') is-invalid @enderror"
                                id="type_accessoire_id" name="type_accessoire_id" required>
                            <option value="">Sélectionner un type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ (old('type_accessoire_id', $accessoire->type_accessoire_id) == $type->id) ? 'selected' : '' }}>
                                    {{ $type->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_accessoire_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="modele_id" class="form-label">Modèle</label>
                        <select class="form-select @error('modele_id') is-invalid @enderror"
                                id="modele_id" name="modele_id" required>
                            <option value="">Sélectionner un modèle</option>
                            @foreach($modeles as $modele)
                                <option value="{{ $modele->id }}"
                                    {{ (old('modele_id', $accessoire->modele_id) == $modele->id) ? 'selected' : '' }}>
                                    {{ $modele->marque->nom }} - {{ $modele->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('modele_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="localisation" class="form-label">Localisation</label>
                        <input type="text" class="form-control @error('localisation') is-invalid @enderror"
                               id="localisation" name="localisation"
                               value="{{ old('localisation', $accessoire->localisation) }}" required>
                        @error('localisation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">Détails</label>
                        <textarea class="form-control @error('detail') is-invalid @enderror"
                                  id="detail" name="detail" rows="3">{{ old('detail', $accessoire->detail) }}</textarea>
                        @error('detail')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="commentaire" class="form-label">Commentaire</label>
                        <textarea class="form-control @error('commentaire') is-invalid @enderror"
                                  id="commentaire" name="commentaire" rows="3">{{ old('commentaire', $accessoire->commentaire) }}</textarea>
                        @error('commentaire')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('accessoires.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
