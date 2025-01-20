<?php

namespace Database\Seeders;

use App\Models\Marque;
use Illuminate\Database\Seeder;

class MarqueSeeder extends Seeder
{
    public function run(): void
    {
        $marques = [
            ['nom' => 'HP', 'description' => 'Hewlett-Packard'],
            ['nom' => 'Dell', 'description' => 'Dell Technologies'],
            ['nom' => 'Lenovo', 'description' => 'Lenovo Group Limited'],
            ['nom' => 'Apple', 'description' => 'Apple Inc.'],
        ];

        foreach ($marques as $marque) {
            Marque::create($marque);
        }
    }
}
