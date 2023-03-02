<?php

namespace App\Action;


use App\Models\User;
use App\Models\Personnels;
use App\Models\RolesPersonnels;
use Illuminate\Support\Facades\DB;
use App\Repositories\PersonnelsRepository;
use App\Http\Requests\StorePersonnelRequest;
use App\Interface\PersonnelsRepositoryInterface;
use App\Models\Compte;
use App\Models\Personnel;
use App\Models\PersonnelRole;

class PersonnelsAction

{
    public function handle($request)
    {
        try {
            $data = DB::transaction(function () use ($request) {
                // dd($request);

                if (!is_null($request->users["name"])) {

                    $personnels = Personnel::Create([
                        "nom_personneles" => $request->personnels["nom_personneles"],
                        "sexe_personneles" => $request->personnels["sexe_personneles"],
                        "date_naissance_personneles" => $request->personnels["date_naissance_personneles"],
                        "lieu_naissance_personneles" => $request->personnels["lieu_naissance_personneles"],
                        "adresse_personneles" => $request->personnels["adresse_personneles"],
                        "telephone_1_personneles" => is_null($request->personnels["telephone_1_personneles"]) ? null : $request->personnels["telephone_1_personneles"],
                        "telephone_2_personneles" => is_null($request->personnels["telephone_2_personneles"]) ? null : $request->personnels["telephone_2_personneles"],
                        "situation_matrimoniale_personneles" => $request->personnels["situation_matrimoniale_personneles"],

                    ]);

                    $username = $request->users['name'];
                    $userEmail = $username . '@salfa.com';
                    $id_personnels = $personnels->id;

                    $users = User::Create([
                        "name" => $request->users["name"],
                        "email" => $userEmail,
                        "password" => $request->users["password"],
                        "personnels_id" => $id_personnels,
                    ]);

                    $compte = Compte::Create([
                        'user_id' => $users->id,
                        'personnel_id' => $id_personnels,
                    ]);

                    $personnelRole = PersonnelRole::Create([
                        'personnel_id' => $id_personnels,
                        'role_id' => $request->users['role_id'],
                        'fonction_id' => $request->rolePersonnels['fonction_id']
                    ]);

                    return [

                        "data"    => $personnels->id,
                        "message" => "l'enregistrement de $personnels->nom_personneles a été bien enregistré",
                    ];

                }
                return [

                    "data"    => 0,
                    "message" => "Une personnel doit avoir une compte precis",
                ];
            });

            return $data;
        } catch (\Exception $th) {
            dd($th, "eto");
            return $th;
        }
    }


    private function insertPersonnelsUser(array $personnels)
    {
        if ($personnels["personnels_id"] != NULL) {
            return $personnels["personnels_id"];
        }
    }
}
