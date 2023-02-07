<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nom_personneles' =>  'Tsangamila Toki\'ny Fanantenana',
            'sexe_personneles' =>  1,
            'date_naissance_personneles' => '1996-02-24',
            'lieu_naissance_personneles' =>'Farafangana' ,
            'adresse_personneles' => 'stpl',
            'telephone_1_personneles' =>  '0346697188',
            'telephone_2_personneles' => '0347927260',
            'situation_matrimoniale_personneles' => 'célibataire',
            // 'departement_id' => 1,
            // 'num_roles_personnels' => 1
            'user_id' => User::factory()
        ];
    }
}
