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
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Glycémie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "3,3-6,2",
                'Unite' => "mmol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Azotemie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "1-14",
                'Unite' => "mmol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Creatininemie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => 96-106,
                'Unite' => "umol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Calcemie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Croisement',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Cholestérolémie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "->5,18",
                'Unite' => "mmol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Uricemie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "150-350",
                'Unite' => "umol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Protidemie',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'ALAT',
                'categorie_examens_labo' => 'Transaminase',
                'valeurs_referrences' => "(0-35)F ; (0-35)H",
                'Unite' => "U/L",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'ASAT',
                'categorie_examens_labo' => 'Transaminase',
                'valeurs_referrences' => "(0-35)",
                'Unite' => "U/L",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Billirubine Direct',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => "mmol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Billirubine Total',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "1,16",
                'Unite' => "mmol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Triglycérides',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "0,45-1,7",
                'Unite' => "mmol/l",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'Aslo',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "< 200 UL/L",
                'Unite' => "UL/L",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => 'CRP',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 1,
                'designation_examens_labo' => "Test d'Emmel ",
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'NFS',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Frottis (GE)',
                'categorie_examens_labo' => 'FP-TDR',
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Scklin',
                'categorie_examens_labo' => 'FP-TDR',
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Ht ',
                'categorie_examens_labo' => 'VSH',
                'valeurs_referrences' => "< 7 mm",
                'Unite' => "mm/H",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Hb ',
                'categorie_examens_labo' => 'VSH',
                'valeurs_referrences' => "< 20 mm",
                'Unite' => "mm/H",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Groupage rhésus',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'TS',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "< 9mm",
                'Unite' => "mm",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'TC',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => "[5-15]mm",
                'Unite' => "mm",
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'VDRL ou RPR',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'TO',
                'categorie_examens_labo' => 'Test Widal',
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'TH',
                'categorie_examens_labo' => 'Test Widal',
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Pregnency Test',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],

            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Urine micro',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Urine ASA',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'FCV',
                'categorie_examens_labo' => 'bacteriologies',
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'FU',
                'categorie_examens_labo' => 'bacteriologies',
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'BH',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'RBK',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Rivalta',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Selles Kop',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'HIV',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Toxoplasmose',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Spermogramme',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
            [
                'type_examen_laboratoire_id' => 2,
                'designation_examens_labo' => 'Sérologie bilharzienne',
                'categorie_examens_labo' => null,
                'valeurs_referrences' => null,
                'Unite' => null,
                'prix_examen' => '3000'
            ],
        ];

        ExamenLaboratoire::insert($exam);
    }
}
