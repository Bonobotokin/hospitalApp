<?php


namespace App\Action;

use App\Models\ConclusionExamen;
use App\Models\Examen;
use App\Repository\ExamenRepository;
use App\Repository\LaboratoireRepository;
use Illuminate\Support\Facades\DB;

class LaboratoireAction
{
    protected $laboratoireRepository;
    protected $examenRepository;

    public function __construct(

        LaboratoireRepository $laboratoireRepository,
        ExamenRepository $examenRepository
    ) {
        $this->laboratoireRepository = $laboratoireRepository;
        $this->examenRepository = $examenRepository;
    }

    public function saveResultationExamen($data)
    {

        try {

            $data = DB::transaction(function () use ($data) {
                // dd($data);

                $examen = $this->saveResultatLaboratoires($data);
                // dd($examen);
                if (is_null($data->conclusion)) {
                    $error = "conclusion";
                    return [
                        "data" => null,
                        "message" => "Vous devais rediger une rapport ou conclusion d'analyse de  $data->patient_nom"
                    ];
                } if ($examen = true) {
                    return [
                        "data" => 0,
                        "message" => "L'enregistrement de l'examen de $data->patient_nom a été bien enregistré"
                    ];
                }
            });


            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveResultatLaboratoires($data)
    {
        // dd($data);
        $nombre = $data->nombre;
        $examens = [];
        $id = "";
        for ($i = 0; $i < $nombre; $i++) {

                $examenLoop = Examen::where('examen_laboratoire_id', $data[$i]['id'])->first();
                $examenLoop->examen_laboratoire_id = $data[$i]['id'];
                $examenLoop->resultat_examens = $data[$i]['resultats'];
                $examenLoop->observation_examens = $data[$i]['observation'];
                $examenLoop->finished = true;
                $examenLoop->save();
                $id = $examenLoop->id;
                $examens[] = $examenLoop->id;
            
        }

        $examensConcatenated = implode(',', $examens);


        foreach ($examens as $key => $value) {
            $rapport = ConclusionExamen::updateOrCreate(
                ['examen_id' => $examensConcatenated],
                ['details' => $data->conclusion]
            );
        }



        return true;
        // count(strpos(var_export($_POST["prj_id"], true), 'famille_');
        // var_export($data, true);
        // dd(strpos(var_export($data,true), 'analyses_'));
    }
}
