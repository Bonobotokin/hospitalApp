<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
                    [
                        'name' => 'BonoboTokin',
                        'email' => 'bonobotokin@admin.com',
                        'password' => bcrypt('23@tokin.DEV')
                    ],
                    [
                        'name' => 'Benja', // Medecin Chef
                        'email' => 'benja@mdecin.com',
                        'password' => bcrypt('salfa1234')
                    ],
                    [
                        'name' => 'Justine', // Receptioniste
                        'email' => 'rceptioniste@salfa.com',
                        'password' => bcrypt('salfa1234')
                    ],

                    [
                        'name' => 'Bezoo', // Magasinier
                        'email' => 'magasinier@salfa.com',
                        'password' => bcrypt('salfa1234')
                    ],

                    [
                        'name' => 'julliana', // Pharmacier
                        'email' => 'pharmacien@salfa.com',
                        'password' => bcrypt('salfa1234')
                    ],
                    [
                        'name' => 'Razafy', // Caissier
                        'email' => 'caissier@salfa.com',
                        'password' => bcrypt('salfa1234')
                    ],

                    [
                        'name' => 'Bonnie', // Secretaire
                        'email' => 'secretaria@salfa.com',
                        'password' => bcrypt('salfa1234')
                    ]
            ];
            User::insert($users);
    }
}
