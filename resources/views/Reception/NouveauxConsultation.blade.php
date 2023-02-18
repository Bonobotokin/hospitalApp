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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nouveaux Patient</h4>
                <form class="form-sample" action="" method="POST">
                    @csrf
                    <p class="card-description"> Information Sur la patient(e) </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Nom">Nom :</label>
                                <input type="text" style="text-transform: uppercase;" name="patient[nom_patient]" class="form-control" placeholder="Nom du patient">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Prenom">Prenom :</label>
                                <input type="text" name="patient[prenom_patient]" class="form-control" placeholder="Nom du patient">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Sexe">Sexe :</label>
                                <select name="patient[sexe_patient]" class="form-control">
                                    <option value="0">Femme</option>
                                    <option value="1">Homme</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Age">Age :</label>
                                <input type="number" name="patient[age_patient]" class="form-control" placeholder="20 Ans">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Contact">Contact :</label>
                                <input type="text" name="patient[contact_patient]" class="form-control" placeholder="+261346697188">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Profession">Profession :</label>
                                <input type="text" name="patient[profession_patient]" class="form-control" placeholder="Profession">
                            </div>
                        </div>
                    </div>
                    <p class="card-description"> Parametre du patient </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Poids">Poids :</label>
                                <input type="text" name="parametres[poids]" class="form-control" placeholder="Poids">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Taills">Taills :</label>
                                <input type="text" name="parametres[taille]" class="form-control" placeholder="Taills">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Temperature">Temperature :</label>
                                <input type="text" name="parametres[temperature]" class="form-control" placeholder="Temperature">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Tension Arteriel">Tension Arteriel :</label>
                                <input type="text" name="parametres[tension]" class="form-control" placeholder="Tension Arteriel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Pouls">Pouls :</label>
                                <input type="text" name="parametres[pouls]" class="form-control" placeholder="Pouls">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Frequence">Frequence :</label>
                                <input type="text" name="parametres[frequence]" class="form-control" placeholder="Frequence">
                            </div>
                        </div>
                    </div>
                    <p class="card-description"> Type de consultation </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Medecins">Medecins qui Refere :</label>
                                
                                <select name="medecin_conultation" class="form-control">
                                   
                                </select>
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
@endsection