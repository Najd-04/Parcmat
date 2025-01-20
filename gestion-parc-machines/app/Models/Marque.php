<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marque extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description'
    ];

    /**
     * Les règles de validation pour les attributs.
     *
     * @var array<string, string>
     */
    public static $rules = [
        'nom' => 'required|string|max:255|unique:marques,nom',
        'description' => 'nullable|string'
    ];

    /**
     * Relation avec les modèles de cette marque
     */
    public function modeles(): HasMany
    {
        return $this->hasMany(Modele::class);
    }

    /**
     * Récupère tous les modèles de type machine
     */
    public function modeleMachines(): HasMany
    {
        return $this->hasMany(Modele::class)->where('type', 'machine');
    }

    /**
     * Récupère tous les modèles de type accessoire
     */
    public function modeleAccessoires(): HasMany
    {
        return $this->hasMany(Modele::class)->where('type', 'accessoire');
    }

    /**
     * Récupère le nombre total de machines de cette marque
     */
    public function getNbMachinesAttribute(): int
    {
        return $this->modeleMachines()
            ->withCount('machines')
            ->get()
            ->sum('machines_count');
    }

    /**
     * Récupère le nombre total d'accessoires de cette marque
     */
    public function getNbAccessoiresAttribute(): int
    {
        return $this->modeleAccessoires()
            ->withCount('accessoires')
            ->get()
            ->sum('accessoires_count');
    }
}
