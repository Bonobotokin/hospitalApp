<?php
namespace App\Action;
use Exception;
use App\Models\Depot;
use App\Models\Produit;
use App\Repository\PersonnelRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProduitsAction 
{
    private $personnelRepository;
    public function __construct(
        PersonnelRepository $personnelRepository
    ){
        $this->personnelRepository = $personnelRepository;
    }

    public function handleProduits($request)
    {
        $magasinierId = Auth::user()->id;
        
        try {
            $data = DB::transaction(function () use ($request, $magasinierId) {

                $magasinierConnetected = $this->personnelRepository->getPersonnelConnected($magasinierId);

                // dd($request);

                $produits = Produit::Create([
                    'designation_produits' => $request['designation'],
                    'abreviation_produits' => $request['abrev'],
                    'type_produits' => $request['type'],
                    'fabriquant' => $request['fabriquant'],
                    'categorie' => $request['categori'],
                    'prix_vente_produits' => $request['prix_vente']
                ]);
                $produits_id = $produits->id;
                
                // default neww produit is store in depot for Magasin central
                
                $depots = Depot::create([
                    'conditionnement_depots' => null,
                    'quantite_depots' => 0,
                    'produit_id' => $produits_id,
                    'magasinier_id' => $magasinierConnetected[0]['id']
                ]);

                return [

                    "data"    => $produits_id,
                    "message" => "L'enregistré de $produits->designation_produits a été bien effectué",
                    ];
            });
            return $data;
        } catch (Exception $th) {
            dd($th, "eto pharmacie");
            return $th;
        }

    }
}

