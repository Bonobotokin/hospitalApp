<?php

namespace Database\Seeders;

use App\Models\Magasinier;
use App\Models\Pharmacien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmacienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pharmaciens')->delete();

        $pharmacien = 
        [
            'personnel_id' => 5,
        ];

        Pharmacien::insert($pharmacien);
    }
}
