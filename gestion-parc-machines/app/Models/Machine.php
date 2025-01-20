<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Machine extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agence_id',
        'modele_id',
        'type_machine_id',
        'numero_serie',
        'detail_appareil',
        'commentaire',
        'localisation'
    ];

    /**
     * Relation avec l'agence
     */
    public function agence(): BelongsTo
    {
        return $this->belongsTo(Agence::class);
    }

    /**
     * Relation avec le modèle
     */
    public function modele(): BelongsTo
    {
        return $this->belongsTo(Modele::class);
    }

    /**
     * Relation avec le type de machine
     */
    public function typeMachine(): BelongsTo
    {
        return $this->belongsTo(TypeMachine::class);
    }

    /**
     * Relation avec les accessoires
     */
    public function accessoires(): HasMany
    {
        return $this->hasMany(Accessoire::class);
    }
}
