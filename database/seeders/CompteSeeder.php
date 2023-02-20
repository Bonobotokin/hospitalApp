<?php

namespace Database\Seeders;

use App\Models\Compte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comptes')->delete();

        $role = [
            [
                'user_id' => 1,
                'personnel_id' => 1
                
            ],
            [
                'user_id' => 2,
                'personnel_id' => 2
                
            ],
            [
                'user_id' => 3,
                'personnel_id' => 3
                
            ],
            [
                'user_id' => 4,
                'personnel_id' => 4
                
            ],
            [
                'user_id' => 5,
                'personnel_id' => 5
                
            ],
            [
                'user_id' => 6,
                'personnel_id' => 6
                
            ],
            [
                'user_id' => 7,
                'personnel_id' => 7
                
            ]
        ];
        
        Compte::insert($role);
    }
}
