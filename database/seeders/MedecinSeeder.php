<?php

namespace Database\Seeders;

use App\Models\Medecin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedecinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medecins')->delete();

        $medecin = [
            'personnel_id' => 2,
            'specialite' => 'Chirugien'
        ];


        Medecin::insert($medecin);
    }
}
