<?php

namespace Database\Seeders;

use App\Models\TypeConsultation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_consultations')->delete();

        $typeCo = [
                [
                    'type_consultaion' => 'Nouveaux Consultation',
                    'prix_consultation' => 3000
                ],
                [
                    'type_consultaion' => 'Contre Visite',
                    'prix_consultation' => 200
                ]
            ];

        TypeConsultation::insert($typeCo);
    }
}
