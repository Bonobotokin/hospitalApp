@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class="alertDanger">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Danger!</strong>
    @foreach ($errors->all() as $error)
    <ul>
        <ol>{{ $error }}</ol>
    </ul>
    @endforeach
</div>
@endif
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nouveaux Personnels</h4>
                <form class="form-sample" action="" method="POST">
                    @csrf
                    <p class="card-description"> Information sur les Personnels </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nom & prenom</label>
                                <div class="col-sm-9">
                                    <input type="text" name="personnels[nom_personneles]" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Sexe</label>
                                <div class="col-sm-9">
                                    <select name="personnels[sexe_personneles]" class="form-control">
                                        <option value="0">Femme</option>
                                        <option value="1">Homme</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date de naissance</label>
                                <div class="col-sm-9">
                                    <input type="date" name="personnels[date_naissance_personneles]" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lieu de naissance</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="personnels[lieu_naissance_personneles]" placeholder="Lieu de naissance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Situation matrimoniale</label>
                                <div class="col-sm-9">
                                    <select name="personnels[situation_matrimoniale_personneles]" class="form-control">
                                        <option value="Celibataire">Celibataire</option>
                                        <option value="Mariee">Mariee</option>
                                        <option value="Fiancee">Fiancee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Adresse</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="personnels[adresse_personneles]" placeholder="Adresse">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Telephone 1</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="personnels[telephone_1_personneles]" placeholder="telephone 1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Telephone 2</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="personnels[telephone_2_personneles]" placeholder="telephone 2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description"> Fonctions du Personnels </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fonction</label>
                                <div class="col-sm-9">
                                    <select name="rolePersonnels[fonction_id]" class="form-control">
                                        <option value=" "></option>
                                        @foreach($allFonctions as $fonctions)
                                            <option value="{{$fonctions['id']}}">{{$fonctions->designation_fonction}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Titre </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rolePersonnels[grade]" placeholder="Titre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Specialite </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="rolePersonnels[specialites]" placeholder="specialistes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description"> Comptes utilisateurs </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nom d'utilisateurs</label>
                                <div class="col-sm-9">
                                    <input type="texte" class="form-control" name="users[name]" placeholder="telephone 2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" name="users[password]" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Roles d'utilisateurs</label>
                                <div class="col-sm-9">
                                    <select name="users[role_id]" class="form-control">
                                        @foreach($allRoles as $role)
                                            <option value="{{$role['role_id']}}">{{$role->designation_role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-lg btn-block">
                                <i class="mdi mdi-account-multiple-minus "></i>
                                Annuler
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                <i class="mdi mdi-account-check "></i>
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection