<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Machine::create([
                'agence_id' => rand(1, 3),
                'modele_id' => rand(1, 6),
                'type_machine_id' => rand(1, 4),
                'numero_serie' => 'SN' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'detail_appareil' => 'Description de la machine ' . $i,
                'commentaire' => 'Commentaire pour la machine ' . $i,
                'localisation' => 'Bureau ' . rand(100, 999),
            ]);
        }
    }
}
