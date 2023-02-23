<?php

namespace Database\Seeders;

use App\Models\ExamenEchoType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenEchoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examen_echo_types')->delete();

        $type = [
            [
                'designation_type_echo' => 'Echographie Pelvienne'
            ],
            [
                'designation_type_echo' => 'Echographie Abdominale'
            ],
            [
                'designation_type_echo' => 'Echographie Abdomino-pelvienne'
            ],
            [
                'designation_type_echo' => 'Echographie Obstetricale'
            ]
        ];

        ExamenEchoType::insert($type);
    }
}
