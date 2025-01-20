<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeMachine extends Model
{
    /**
     * Nom de la table dans la base de données
     */
    protected $table = 'type_machines';

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
        'nom' => 'required|string|max:255|unique:type_machines,nom',
        'description' => 'nullable|string'
    ];

    /**
     * Relation avec les machines de ce type
     */
    public function machines(): HasMany
    {
        return $this->hasMany(Machine::class);
    }

    /**
     * Récupère le nombre de machines de ce type
     */
    public function getNbMachinesAttribute(): int
    {
        return $this->machines()->count();
    }

    /**
     * Récupère les machines par agence pour ce type
     */
    public function getMachinesParAgenceAttribute(): array
    {
        return $this->machines()
            ->select('agence_id')
            ->with('agence:id,nom')
            ->groupBy('agence_id')
            ->selectRaw('count(*) as total')
            ->get()
            ->pluck('total', 'agence.nom')
            ->toArray();
    }
}
