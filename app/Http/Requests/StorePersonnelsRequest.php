<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonnelsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'personnels.nom_personneles' => 'required|String',
            'personnels.date_naissance_personneles' => 'required',
            'personnels.lieu_naissance_personneles' => 'required|String',
            'personnels.adresse_personneles' => 'required|String'
            
        ];
    }

    public function messages()
    {
        return [            
            'personnels.nom_personneles' => 'Le nom de personnnels ne peut pas etre vide',
            'personnels.date_naissance_personneles' => 'Veuillez renseigne son date de naissance',
            'personnels.lieu_naissance_personneles' => 'Veuillez renseigne le lieu de naissace',
            'personnels.adresse_personneles' => 'Veuillez renseigne son adresse',
            'users.password' => 'le mot de passe ne peut pas etre vide'
            
        ];
    }
}
