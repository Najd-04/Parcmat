<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MarqueSeeder::class,
            AgenceSeeder::class,
            TypeMachineSeeder::class,
            TypeAccessoireSeeder::class,
            ModeleSeeder::class,
            MachineSeeder::class,
            AccessoireSeeder::class,
        ]);
    }
}
