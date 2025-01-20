<?php

namespace Database\Seeders;

use App\Models\Agence;
use Illuminate\Database\Seeder;

class AgenceSeeder extends Seeder
{
    public function run(): void
    {
        $agences = [
            [
                'nom' => 'Paris Ouest',
                'adresse' => '89 Rue du Château, 92100 Boulogne Billancourt',
                'telephone' => '01 41 10 80 11',
                'email' => 'parisouest@maintronic.com'
            ],
            [
                'nom' => 'Paris Est Exclusivement Vidéoprojecteurs',
                'adresse' => '19 Rue Sadi Carnot, 94880 Noiseau',
                'telephone' => '01 49 62 06 03',
                'email' => 'parisest@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Ile-de-France',
                'adresse' => '7 Allée du Brévent, 91019 Evry Courcouronnes',
                'telephone' => '01 60 76 12 60',
                'email' => 'iledefrance@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Bourges',
                'adresse' => '18 Avenue du 11 Novembre 1918, 18000 Bourges',
                'telephone' => '02 48 57 68 40',
                'email' => 'bourges@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Nord-Pas-de-Calais',
                'adresse' => '681 Avenue de la République, 59000 Lille',
                'telephone' => '03 20 19 04 10',
                'email' => 'nordpasdecalais@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Bretagne',
                'adresse' => '8 Boulevard de la Robiquette, 35760 Saint-Grégoire',
                'telephone' => '02 99 23 62 23',
                'email' => 'bretagne@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Pays de la Loire',
                'adresse' => '152 Rue François René De Chateaubriand, Parc d\'Activité du Moulin - Bât. D4,44470 Carquefou ',
                'telephone' => '02 51 85 22 70',
                'email' => 'paysdelaloire@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Alsace',
                'adresse' => '2 Rue André Marie Ampère, 67450 Mundolsheim',
                'telephone' => '03 90 22 79 40',
                'email' => 'alsace@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Rhône-Alpes',
                'adresse' => '155 route de Grenoble, 69800 SAINT PRIEST',
                'telephone' => '04 72 14 95 00',
                'email' => 'rhonea-alpes@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Rhône-Alpes',
                'adresse' => '155 route de Grenoble, 69800 SAINT PRIEST',
                'telephone' => '04 72 14 95 00',
                'email' => 'rhone-alpes@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Aquitaine',
                'adresse' => '1 Avenue Rudolf Diesel, Parc d’Activité Kennedy, 33700 Merignac',
                'telephone' => '05 57 10 67 67',
                'email' => 'aquitaine@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Provence',
                'adresse' => '30 Rue des 4 Gendarmes d’Ouvéa, 84000 Avignon',
                'telephone' => '04 32 74 33 50',
                'email' => 'provence@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Midi-Pyrénées',
                'adresse' => '109 rue Jean Bart, bâtiment Diapason B, 31670 Labège',
                'telephone' => '05 61 73 11 41',
                'email' => 'midi-pyrénées@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Languedoc-Roussillon',
                'adresse' => '1350 Avenue Albert Einstein, PAT du Millénaire, Bâtiment 2, 34000 Montpellier',
                'telephone' => '04 67 15 66 80',
                'email' => 'languedoc-roussillon@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Méditerranée',
                'adresse' => 'Artiparc II, Bâtiment D1, Chemin de Saint Lambert, 13821 La Penne Sur Huveaune',
                'telephone' => '04 91 87 83 93',
                'email' => 'méditerranée@maintronic.com'
            ],
            [
                'nom' => 'Maintronic Côtes d’Azur',
                'adresse' => '1 856 Chemin de St Bernard, 06220 Vallauris',
                'telephone' => '04 92 91 90 90',
                'email' => 'côtes-d-azur@maintronic.com'
            ]];

        foreach ($agences as $agence) {
            Agence::create($agence);
        }
    }
}
