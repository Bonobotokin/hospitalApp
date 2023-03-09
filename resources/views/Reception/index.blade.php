@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Patients</h4>
                    <div class="template-demo mb-2">
                    </div>
                    <div class="table-responsive">                       
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>									
                                    <th> Matricule </th>
                                    <th> Nom & prenom </th>
                                    <th> Age </th>
                                    <th> Sexe </th>
                                    <th> Action </th>
								</tr>
							</thead>
                            <tbody>
                                
                               @foreach ( $listePatient as $liste )
                                   <tr>
                                   <td> {{ $liste['matricule']}} </td>
                                    <td> {{ $liste['nom'] }} {{ $liste['prenom'] }} </td>
                                    <td> {{ $liste['age']}} </td>
                                    <td> 
                                        @if($liste['sexe'] == 0)
                                            Femme
                                        @else
                                            Homme
                                        @endif
                                    </td>
                                    <td class="template-demo">
                                        <a  type="button" class="badge badge-info btn-block">
                                            Modifier 
                                            <i class="mdi mdi-refresh float-right"></i>
                                        </a>    
                                        <br><br>
                                        <a  type="button" class="badge badge-success btn-block">
                                            Plus de details 
                                            <i class="mdi mdi-hospital float-right"></i>
                                        </a>                                                
                                    </td>
                                   </tr>
                               @endforeach
                            </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection