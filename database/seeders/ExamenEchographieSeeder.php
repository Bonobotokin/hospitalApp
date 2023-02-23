<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenEchographieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examen_echographies')->delete();

        $echographie = 
        [
            [
                'examen_echo_types_id' => 1,
                'designation_examens_echo' => 'Hepatique',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 1,
                'designation_examens_echo' => 'Renale',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 1,
                'designation_examens_echo' => 'Doller',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 2,
                'designation_examens_echo' => 'Thyroidenne',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 2,
                'designation_examens_echo' => 'cardique',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 3,
                'designation_examens_echo' => 'Oculaire',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 3,
                'designation_examens_echo' => 'prostate',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 4,
                'designation_examens_echo' => 'Plurale',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
            [
                'examen_echo_types_id' => 4,
                'designation_examens_echo' => 'PartieMollers',
                'image_examens_echo' => null,
                'prix_examen' => 500
            ],
        ];
    }
}
