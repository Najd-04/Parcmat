<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agence extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email'
    ];

    /**
     * Les règles de validation pour les attributs.
     *
     * @var array<string, string>
     */
    public static $rules = [
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string',
        'telephone' => 'required|string|max:20',
        'email' => 'required|email|max:255'
    ];

    /**
     * Relation avec les machines de l'agence
     */
    public function machines(): HasMany
    {
        return $this->hasMany(Machine::class);
    }

    /**
     * Relation avec les accessoires de l'agence
     */
    public function accessoires(): HasMany
    {
        return $this->hasMany(Accessoire::class);
    }

    /**
     * Récupère le nombre total de machines dans l'agence
     */
    public function getNbMachinesAttribute(): int
    {
        return $this->machines()->count();
    }
}
