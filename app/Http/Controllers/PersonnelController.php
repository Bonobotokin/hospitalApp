<?php

namespace App\Http\Controllers;

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
        return view('Personnels.nouveauxPersonnels',
            [
                
                'allFonctions' => $fonction,
                'allRoles' => $role
            ]
        );

    }
}
