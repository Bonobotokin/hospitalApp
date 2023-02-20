@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Personnels</h4>
                    <div class="template-demo mb-2">
                        <a type="button" href="{{ route('personnel.nouveaux') }}"
                            class="btn btn-outline-primary btn-fw">
							Nouveaux Personnels
						</a>
                    </div>
                    <div class="table-responsive">                       
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>									
                                    <th> Image </th>
                                    <th> Nom & prenom </th>
                                    <th> Telephone </th>
                                    <th> Fonctions </th>
                                    <th> Action </th>
								</tr>
							</thead>
							
                            <tbody>
								@foreach($allPersonnels as $personnel)
									<tr>
										<td class="py-1">
											@if($personnel['sexe'] == FALSE)
												<img src="{{asset('assets/images/faces-clipart/pic-3.png')}}" alt="image">
											@else
												<img src="{{asset('assets/images/faces-clipart/pic-8.png')}}" alt="image">
											@endif
										</td>
										<td> {{$personnel['nom']}} </td>
										<td> 
											<p>
												@if(!is_null($personnel['telephone_1']))
													+261{{$personnel['telephone_1']}}
												@endif
											</p>
											<p>
												@if(!is_null($personnel['telephone_2']))
													+261{{$personnel['telephone_2']}}
												@endif
											</p>
										</td>
										<td> {{$personnel['fonction']}} </td>

										<td> 
											<div class="btn-group">
												<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
													Plus de details
												</button>
												<div class="dropdown-menu" style="">
													<a class="dropdown-item">Profil</a>
												  <a class="dropdown-item">Modifier</a>
												  <a class="dropdown-item">Supprimer</a>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
                            </tbody>
							<tfoot>
								<tr>																
                                    <th> Image </th>
                                    <th> Nom & prenom </th>
                                    <th> Telephone </th>
                                    <th> Fonctions </th>
                                    <th> Action </th>
								</tr>
							</tfoot>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection