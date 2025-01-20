<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modele extends Model
{
    /**
     * Nom de la table dans la base de données
     */
    protected $table = 'modeles';

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'marque_id',
        'nom',
        'description',
        'type' // 'machine' ou 'accessoire'
    ];

    /**
     * Les règles de validation pour les attributs.
     *
     * @var array<string, string>
     */
    public static $rules = [
        'marque_id' => 'required|exists:marques,id',
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string',
        'type' => 'required|in:machine,accessoire'
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'string'
    ];

    /**
     * Relation avec la marque
     */
    public function marque(): BelongsTo
    {
        return $this->belongsTo(Marque::class);
    }

    /**
     * Relation avec les machines de ce modèle
     */
    public function machines(): HasMany
    {
        return $this->hasMany(Machine::class);
    }

    /**
     * Relation avec les accessoires de ce modèle
     */
    public function accessoires(): HasMany
    {
        return $this->hasMany(Accessoire::class);
    }

}
