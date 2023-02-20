<?php

namespace Database\Seeders;

use App\Models\Fonction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fonctions')->delete();

        $role = [
            [
                'designation_fonction' => 'Informaticien'
            ],
            [
                'personnel_id' => 'Medecin'
            ],
            [
                'personnel_id' => 'Pharmacien'
            ],
            [
                'personnel_id' => 'Magasinier'
            ],
            [
                'personnel_id' => 'Infirmier'
            ],
            [
                'personnel_id' => 'Medecin'
            ],
            [
                'personnel_id' => 'Receptioniste'
            ],
            [
                'personnel_id' => 'Caissier'
            ],
            [
                'personnel_id' => 'Secretaire'
            ]
        ];
        
        Fonction::insert($role);
    }
}
