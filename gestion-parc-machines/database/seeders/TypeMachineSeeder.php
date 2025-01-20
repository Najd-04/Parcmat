<?php

namespace Database\Seeders;

use App\Models\TypeMachine;
use Illuminate\Database\Seeder;

class TypeMachineSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nom' => 'Ordinateur portable', 'description' => 'Ordinateur portable professionnel'],
            ['nom' => 'Ordinateur fixe', 'description' => 'Ordinateur de bureau'],
            ['nom' => 'Serveur', 'description' => 'Serveur professionnel'],
            ['nom' => 'Imprimante', 'description' => 'Imprimante professionnelle'],
        ];

        foreach ($types as $type) {
            TypeMachine::create($type);
        }
    }
}
