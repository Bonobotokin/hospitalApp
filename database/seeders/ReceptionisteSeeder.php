<?php

namespace Database\Seeders;

use App\Models\Receptioniste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceptionisteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receptionistes')->delete();

        $receptioniste = 
        [
            'personnel_id' => 3,
        ];

        Receptioniste::insert($receptioniste);
    }
}
