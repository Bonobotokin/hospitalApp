<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Magasin;
use App\Models\Magasinier;
use App\Models\Personnel;
use App\Models\Pharmacien;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Personnel::factory(1)->create();
        Magasinier::factory(1)->create();
        Pharmacien::factory(1)->create();
    }
}
