<?php

use App\Http\Controllers\AccessoireController;
use App\Http\Controllers\MachineController;
use Illuminate\Support\Facades\Route;

// Rediriger la page d'accueil vers le tableau de bord
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Routes pour les machines
Route::resource('machines', MachineController::class);
Route::resource('accessoires', AccessoireController::class);

// Route pour récupérer les modèles d'une marque
Route::get('/api/marques/{marque}/modeles', function($marque) {
    return App\Models\Modele::where('marque_id', $marque)
        ->where('type', 'machine')
        ->get(['id', 'nom']);
});
