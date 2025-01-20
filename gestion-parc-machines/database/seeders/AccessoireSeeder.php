<?php

namespace Database\Seeders;

use App\Models\Accessoire;
use App\Models\Machine;
use App\Models\Modele;
use App\Models\TypeAccessoire;
use Illuminate\Database\Seeder;

class AccessoireSeeder extends Seeder
{
    public function run(): void
    {
        // D'abord, créons quelques modèles d'accessoires s'ils n'existent pas
        $modelesAccessoires = [
            ['marque_id' => 1, 'nom' => 'Monitor P24h', 'type' => 'accessoire'],
            ['marque_id' => 1, 'nom' => 'Keyboard K400', 'type' => 'accessoire'],
            ['marque_id' => 2, 'nom' => 'Mouse M330', 'type' => 'accessoire'],
            ['marque_id' => 2, 'nom' => 'Dock D6000', 'type' => 'accessoire'],
            ['marque_id' => 3, 'nom' => 'Headset H390', 'type' => 'accessoire'],
            ['marque_id' => 4, 'nom' => 'Magic Mouse', 'type' => 'accessoire'],
        ];

        foreach ($modelesAccessoires as $modele) {
            Modele::firstOrCreate(
                ['nom' => $modele['nom']],
                $modele
            );
        }

        // Récupérer les IDs nécessaires
        $machines = Machine::all();
        $modeles = Modele::where('type', 'accessoire')->get();
        $types = TypeAccessoire::all();

        // Créer 30 accessoires de test
        for ($i = 1; $i <= 30; $i++) {
            Accessoire::create([
                'machine_id' => $machines->random()->id, // Assigner aléatoirement à une machine
                'modele_id' => $modeles->random()->id,
                'type_accessoire_id' => $types->random()->id,
                'numero_serie' => 'ACC' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'detail' => 'Détails de l\'accessoire ' . $i,
                'commentaire' => rand(0, 1) ? 'Commentaire pour l\'accessoire ' . $i : null,
                'localisation' => 'Bureau ' . rand(100, 999),
            ]);
        }

        // Créer quelques accessoires sans machine assignée
        for ($i = 31; $i <= 40; $i++) {
            Accessoire::create([
                'machine_id' => null,
                'modele_id' => $modeles->random()->id,
                'type_accessoire_id' => $types->random()->id,
                'numero_serie' => 'ACC' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'detail' => 'Accessoire en stock ' . $i,
                'commentaire' => 'En attente d\'attribution',
                'localisation' => 'Stock',
            ]);
        }
    }
}
