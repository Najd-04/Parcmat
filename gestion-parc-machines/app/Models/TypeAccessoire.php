<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeAccessoire extends Model
{
    /**
     * Nom de la table dans la base de données
     */
    protected $table = 'type_accessoires';

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
        'nom' => 'required|string|max:255|unique:type_accessoires,nom',
        'description' => 'nullable|string'
    ];

    /**
     * Relation avec les accessoires de ce type
     */
    public function accessoires(): HasMany
    {
        return $this->hasMany(Accessoire::class);
    }

    /**
     * Récupère le nombre d'accessoires de ce type
     */
    public function getNbAccessoiresAttribute(): int
    {
        return $this->accessoires()->count();
    }

    /**
     * Récupère les accessoires par machine pour ce type
     */
    public function getAccessoiresParMachineAttribute(): array
    {
        return $this->accessoires()
            ->select('machine_id')
            ->with('machine:id,numero_serie')
            ->groupBy('machine_id')
            ->selectRaw('count(*) as total')
            ->get()
            ->pluck('total', 'machine.numero_serie')
            ->toArray();
    }
}
