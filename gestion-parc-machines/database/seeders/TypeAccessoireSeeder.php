<?php

namespace Database\Seeders;

use App\Models\TypeAccessoire;
use Illuminate\Database\Seeder;

class TypeAccessoireSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'nom' => 'Écran',
                'description' => 'Écrans et moniteurs externes'
            ],
            [
                'nom' => 'Clavier',
                'description' => 'Claviers externes filaires ou sans fil'
            ],
            [
                'nom' => 'Souris',
                'description' => 'Souris et pointeurs'
            ],
            [
                'nom' => 'Dock Station',
                'description' => 'Stations d\'accueil pour ordinateurs portables'
            ],
            [
                'nom' => 'Casque',
                'description' => 'Casques audio et micro'
            ],
            [
                'nom' => 'Webcam',
                'description' => 'Caméras pour visioconférence'
            ],
            [
                'nom' => 'Disque externe',
                'description' => 'Disques durs et SSD externes'
            ],
        ];

        foreach ($types as $type) {
            TypeAccessoire::create($type);
        }
    }
}
