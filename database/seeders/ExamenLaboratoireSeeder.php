<?php

namespace Database\Seeders;

use App\Models\ExamenLaboratoire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenLaboratoireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examen_laboratoires')->delete();

        $exam = [
            [ 
                'designation_examens_labo' => 'Glycémie',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Uricemie',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Aslo',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'ASAT-ALAT',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Triglycérides',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Cholestérolémie',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'CRP',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'VSH',
                'prix_examen' => '3000'
            ],

            [ 
                'designation_examens_labo' => 'RBK',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'NFS',
                'prix_examen' => '3000'
            ],

            [ 
                'designation_examens_labo' => 'CRP',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Groupage rhésus',
                'prix_examen' => '3000'
            ],

            [ 
                'designation_examens_labo' => 'TDR',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Frottis palu',
                'prix_examen' => '3000'
            ],

            [ 
                'designation_examens_labo' => 'GE/FM',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Pregnacy test',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Urine micro ASA',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Sérologie widal Félix',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'HIV',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'VDRL-TPHA',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Toxoplasmose',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Sérologie bilharzienne',
                'prix_examen' => '3000'
            ],

            [ 
                'designation_examens_labo' => 'FCV',
                'prix_examen' => '3000'
            ],
            [ 
                'designation_examens_labo' => 'Frottis sken',
                'prix_examen' => '3000'
            ],

            [ 
                'designation_examens_labo' => 'FU',
                'prix_examen' => '3000'
            ],
        ];

        ExamenLaboratoire::insert($exam);
    }
}
