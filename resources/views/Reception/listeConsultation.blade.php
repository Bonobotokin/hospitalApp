@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Patients</h4>
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
                                    <th> Matricule </th>
                                    <th> Nom & prenom </th>
                                    <th> Age </th>
                                    <th> Sexe </th>
                                    <th> A propos </th>
                                    <th> Action </th>
								</tr>
							</thead>
                            <tbody>
                               
                            </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection