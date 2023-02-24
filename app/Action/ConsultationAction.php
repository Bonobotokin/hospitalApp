<?php 

namespace App\Action;

use Illuminate\Support\Facades\DB;

class ConsultationAction 
{

    public function newPatientConsulted($request) {

        try {
            dd($request);
            $data = DB::transaction(function () use ($request) {

            });

            return $data;

        } catch (\Throwable $th) {
            return $th;
        }
    }

}