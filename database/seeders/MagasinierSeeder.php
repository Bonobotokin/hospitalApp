<?php

namespace Database\Seeders;

use App\Models\Magasinier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MagasinierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('magasiniers')->delete();

        $magasinier = 
        [
            'personnel_id' => 4,
        ];

        Magasinier::insert($magasinier);
    }
}
