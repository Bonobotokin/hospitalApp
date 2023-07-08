<?php

namespace Database\Seeders;

use App\Models\TypeExamenLaboratoire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeExamenLaboratoireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_examen_laboratoires')->delete();

        $types = [
            ['nom' => 'Chimie'],
            ['nom' => 'Hemathologie']
        ];

        TypeExamenLaboratoire::insert($types);
    }
}
