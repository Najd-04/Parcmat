<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accessoire extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'machine_id',
        'modele_id',
        'type_accessoire_id',
        'numero_serie',
        'detail',
        'commentaire',
        'localisation'
    ];

    /**
     * Relation avec la machine à laquelle appartient l'accessoire
     */
    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }

    /**
     * Relation avec le modèle de l'accessoire
     */
    public function modele(): BelongsTo
    {
        return $this->belongsTo(Modele::class);
    }

    /**
     * Relation avec le type d'accessoire
     */
    public function typeAccessoire(): BelongsTo
    {
        return $this->belongsTo(TypeAccessoire::class);
    }
}
