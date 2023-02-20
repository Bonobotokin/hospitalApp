<?php

namespace Database\Seeders;

use App\Models\PersonnelRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnelRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnel_roles')->delete();

        $role = [
            [
                'personnel_id' => 1,
                'fonction_id' => 1,
                'role_id' => 1
            ],
            [
                'personnel_id' => 2,
                'fonction_id' => 2,
                'role_id' => 1
            ],
            [
                'personnel_id' => 3,
                'fonction_id' => 7,
                'role_id' => 2
            ],
            [
                'personnel_id' => 4,
                'fonction_id' => 4,
                'role_id' => 2
            ],
            [
                'personnel_id' => 5,
                'fonction_id' => 3,
                'role_id' => 2
            ],
            [
                'personnel_id' => 6,
                'fonction_id' => 8,
                'role_id' => 2
            ],
            [
                'personnel_id' => 7,
                'fonction_id' => 9,
                'role_id' => 2
            ]
        ];
        
        PersonnelRole::insert($role);
    }
}
