<?php

namespace App\Http\Controllers;

use App\Action\PersonnelsAction;
use App\Http\Requests\StorePersonnelsRequest;
use App\Repository\FonctionsRepository;
use App\Repository\PersonnelRepository;
use App\Repository\RolesRepository;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{

    protected $personnelRepository;
    protected $fonctionsRepository;
    protected $rolesRepository;

    public function __construct(

        PersonnelRepository $personnelRepository,
        FonctionsRepository $fonctionsRepository,
        RolesRepository $rolesRepository
    )
    {
        
        $this->personnelRepository = $personnelRepository;
        $this->fonctionsRepository = $fonctionsRepository;
        $this->rolesRepository = $rolesRepository;

    }

    public function index ()  {

        $allPersonnels = $this->personnelRepository->getAllPersonnels();
        return view('Personnels.liste', 
            [
                'allPersonnels'=> $allPersonnels,
            ]
        );
    }


    public function create() {
        
        
        $fonction = $this->fonctionsRepository->getAllFonctions();
        $role = $this->rolesRepository->getAllRoles();
        // dd($role);
        return view('Personnels.nouveauxPersonnels',
            [
                
                'allFonctions' => $fonction,
                'allRoles' => $role
            ]
        );

    }

    public function store(StorePersonnelsRequest $request, PersonnelsAction $action)
    {
        // dd($request,'eto 1');exit;
        try {

            $response_action = $action->handle($request);
            // dd($response_action);
            if (!is_null($response_action['data'])) {

            // dd($response_action);
                return redirect()->route('personnel.liste',['reponse'=>$response_action])->with('success', $response_action['message']);
                
            }else {
                
                // dd($response_action);
                // return redirect()::back()->withErrors($errors)->withInput();
                return redirect()->route('personnel.nouveaux',['reponse'=>$response_action])->with('errors',$response_action['message']);
            }
        } catch (\exception $th) {
            //throw $th;
            return $th;
        }

        
    }
}
