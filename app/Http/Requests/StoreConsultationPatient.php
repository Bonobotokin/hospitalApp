<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationPatient extends FormRequest
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
            'patient.nom_patient' => 'required',
            'patient.age_patient' => 'required',
            'parametres.poids' => 'required',
            'parametres.taille' => 'required',
            'parametres.temperature' => 'required',
            'parametres.tension' => 'required',
            'parametres.pouls' => 'required',
            'parametres.frequence' => 'required',
            'consultation.type_consultaion_1' => 'required',
            'medecin_conultation' => 'required'
            // 'consultation.'
        ];
    }

    public function messages()
    {
        return [         

            'patient.nom_patient' => 'Le nom du patient ne peut pas etre vide',
            'patient.age_patient' => 'Une patient doit toujour avoir une age',
            'parametres.poids_patient' => 'Quelle est le poids du patient',
            'parametres.taille_patient' => 'La taille du patient ne doit pas etre vide',
            'parametres.temperature_patient' => 'La temperature ne doit pas etre vide',
            'parametres.tension_patient' => 'le ou la patient doit avoir toujour avoir une temperature en degrer celcius',
            'parametres.pouls_patient' => 'veuillez renseigner son pouls',
            'parametres.frequence_patient' => 'le frequence ne doit pas etrte vide',
            'consultation.type_consultaion_1' => 'veuilles choisir son type de consultation',
            'medecin_conultation' => 'Veuillez renseigner le Medecin qui refere'
            
        ];
    }
}