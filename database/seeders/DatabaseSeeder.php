<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ExamenEchoType;
use App\Models\ExamenLaboratoire;
use App\Models\TypeExamenLaboratoire;
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
        
        // Personnel::factory(1)->create();
        // Magasinier::factory(1)->create();
        // Pharmacien::factory(1)->create();

        $this->call([
            ServiceMedicaleSeeder::class,
            UserSeeder::class,
            PersonnelSeeder::class,
            RoleSeeder::class,
            FonctionSeeder::class,
            CompteSeeder::class,
            PersonnelRoleSeeder::class,
            TypeConsultationSeeder::class,
            MagasinierSeeder::class,
            PharmacienSeeder::class,
            MedecinSeeder::class,
            ReceptionisteSeeder::class,
            TypeExamenLaboratoireSeeder::class,
            ExamenLaboratoireSeeder::class,
            ExamenEchoTypeSeeder::class,
            ExamenEchographieSeeder::class,
        ]);
    }
}
