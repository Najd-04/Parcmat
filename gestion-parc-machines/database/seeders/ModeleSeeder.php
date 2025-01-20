<?php

namespace Database\Seeders;

use App\Models\Modele;
use Illuminate\Database\Seeder;

class ModeleSeeder extends Seeder
{
    public function run(): void
    {
        $modeles = [
            ['marque_id' => 1, 'nom' => 'EliteBook', 'type' => 'machine'],
            ['marque_id' => 1, 'nom' => 'ProBook', 'type' => 'machine'],
            ['marque_id' => 2, 'nom' => 'Latitude', 'type' => 'machine'],
            ['marque_id' => 2, 'nom' => 'Precision', 'type' => 'machine'],
            ['marque_id' => 3, 'nom' => 'ThinkPad', 'type' => 'machine'],
            ['marque_id' => 4, 'nom' => 'MacBook Pro', 'type' => 'machine'],
        ];

        foreach ($modeles as $modele) {
            Modele::create($modele);
        }
    }
}
