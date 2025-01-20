@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier la Machine</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('machines.update', $machine) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="numero_serie" class="form-label">Numéro de série</label>
                        <input type="text" class="form-control @error('numero_serie') is-invalid @enderror"
                               id="numero_serie" name="numero_serie"
                               value="{{ old('numero_serie', $machine->numero_serie) }}" required>
                        @error('numero_serie')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="agence_id" class="form-label">Agence</label>
                        <select class="form-select @error('agence_id') is-invalid @enderror"
                                id="agence_id" name="agence_id" required>
                            <option value="">Sélectionner une agence</option>
                            @foreach($agences as $agence)
                                <option value="{{ $agence->id }}"
                                    {{ (old('agence_id', $machine->agence_id) == $agence->id) ? 'selected' : '' }}>
                                    {{ $agence->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('agence_id')
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
                                    {{ (old('modele_id', $machine->modele_id) == $modele->id) ? 'selected' : '' }}>
                                    {{ $modele->marque->nom }} - {{ $modele->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('modele_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_machine_id" class="form-label">Type de machine</label>
                        <select class="form-select @error('type_machine_id') is-invalid @enderror"
                                id="type_machine_id" name="type_machine_id" required>
                            <option value="">Sélectionner un type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ (old('type_machine_id', $machine->type_machine_id) == $type->id) ? 'selected' : '' }}>
                                    {{ $type->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_machine_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="localisation" class="form-label">Localisation</label>
                        <input type="text" class="form-control @error('localisation') is-invalid @enderror"
                               id="localisation" name="localisation"
                               value="{{ old('localisation', $machine->localisation) }}" required>
                        @error('localisation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="detail_appareil" class="form-label">Détails</label>
                        <textarea class="form-control @error('detail_appareil') is-invalid @enderror"
                                  id="detail_appareil" name="detail_appareil" rows="3">{{ old('detail_appareil', $machine->detail_appareil) }}</textarea>
                        @error('detail_appareil')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="commentaire" class="form-label">Commentaire</label>
                        <textarea class="form-control @error('commentaire') is-invalid @enderror"
                                  id="commentaire" name="commentaire" rows="3">{{ old('commentaire', $machine->commentaire) }}</textarea>
                        @error('commentaire')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('machines.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
