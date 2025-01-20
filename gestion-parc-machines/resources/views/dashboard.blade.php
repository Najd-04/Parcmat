@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h1 class="display-4 mb-4">Bienvenue dans la Gestion du Parc Machines</h1>
                        <p class="lead mb-4">
                            Gérez facilement votre parc de machines et leurs accessoires
                        </p>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Machines</h5>
                                        <p class="card-text">Gérez toutes vos machines</p>
                                        <a href="{{ route('machines.index') }}" class="btn btn-primary">
                                            Voir les machines
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Accessoires</h5>
                                        <p class="card-text">Gérez tous vos accessoires</p>
                                        <a href="{{ route('accessoires.index') }}" class="btn btn-primary">
                                            Voir les accessoires
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    Pour commencer, cliquez sur une des options ci-dessus ou utilisez le menu de navigation.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center bg-primary text-white mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">{{ App\Models\Machine::count() }}</h3>
                                    <p class="card-text">Machines</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center bg-success text-white mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">{{ App\Models\Accessoire::count() }}</h3>
                                    <p class="card-text">Accessoires</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center bg-info text-white mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">{{ App\Models\Agence::count() }}</h3>
                                    <p class="card-text">Agences</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
