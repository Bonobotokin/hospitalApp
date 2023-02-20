@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Liste des Consultation Ajourdhuit</h4>
                    <div class="template-demo mb-2">
                        <a type="button" href="{{ route('create.consultation') }}"
                            class="btn btn-outline-primary btn-fw">
							Nouveaux Consultation
						</a>
                    </div>
                    <div class="table-responsive">                       
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>									
                                    <th> Numero </th>
                                    <th> Nom & prenom </th>
                                    <th> Age </th>
                                    <th> Sexe </th>
                                    <th> A propos </th>
                                    <th> Medecin </th>
                                    <th> Action </th>
								</tr>
							</thead>
                            <tbody>
                                @foreach ( $listeConsultation as $liste)
                                    @if ($liste['date_enregistrement'] = $dateConsultation)
                                        <tr>
                                            <td> {{$liste['matricule'] }} </td>
                                            <td> {{$liste['nom'] }} {{$liste['prenom'] }} </td>
                                            <td> {{$liste['age'] }}</td>                                            
                                            <td>
                                                @if($liste['sexe'] === 0)
                                                    Femme
                                                @else
                                                    Homme
                                                @endif
                                            </td>
                                            <td>
                                                @if ($liste['consultation'] == 1)
                                                    <label class="badge badge-danger">{{ $liste['type_consultation'] }}</label>
                                                @elseif ($liste['consultation'] == 2)
                                                    <label class="badge badge-info">{{ $liste['type_consultation'] }}</label>
                                                @endif
                                            </td>
                                            <td> {{$liste['nom_medecin']}} </td>
                                            <td class="template-demo">
                                                <a  type="button" class="badge badge-warning btn-block">
                                                    Modifier 
                                                    <i class="mdi mdi-refresh float-right"></i>
                                                </a>    
                                                <br><br>
                                                <a  type="button" class="badge badge-info btn-block">
                                                    Plus de details 
                                                    <i class="mdi mdi-show float-right"></i>
                                                </a>                                                  
                                            </td>
                                        </tr>  
                                    @endif                                  
                                @endforeach
                            </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection