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
                <h4 class="card-title text-center">
                    Enregistrer & Livrais 2
                </h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin" id="listeMedicament" style="min-height: 100vh">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <input onkeyup="searchIng()" type="text" id="inputSearch" class="form-control" placeholder="Search products">
                    <table id="tableCommandeProduits" class="table table-hover">
                        <thead>
                            <tr>
                                <th> Code </th>
                                <th> Categorie</th>
                                <th> Nom </th>
                                <th> Abrev </th>
                            </tr>
                        </thead>
                        <tbody id="myUL">
                            @foreach ($produits as $data)
                            <tr id="content_search" onclick="getElement()" class="content_search" style="cursor:pointer">
                                <td id="idProduits"> {{ $data['num'] }} </td>
                                <td id="nom"> {{ $data['nom'] }} </td>
                                <td id="categorie"> {{ $data['categorie'] }} </td>
                                <td id="abrev"> {{ $data['abrev'] }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 grid-margin" id="cardConsultation">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form method="POST">
                        <h6 class=" m-6 text-center">
                            Information sur le Medicament
                        </h6>
                        <div class="row">
                            <input id="codeProduits" type="hidden" class="form-control" type="number" name="numProduits">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Designation :</label>
                                    <input id="designation" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Categori :</label>
                                    <input id="categorieValue" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class=" m-6 text-center">
                            Information sur le commande
                        </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Conditionnement">Conditionnement : </label>
                                    <input id="conditionnement" type="text" placeholder="Conditionnement" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Quantite">Quantite en Unitaire : </label>
                                    <input id="quantite" type="text" placeholder="Quantiter a commander" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Quantite">Observation  : </label>
                                    <input id="etat" type="text" placeholder="observation" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <button type="reset" class="btn btn-inverse-danger btn-fw">
                                    <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                    Annuler
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" onclick="addMedicammentCommander()" class="btn btn-inverse-primary btn-fw">
                                    <i class="mdi mdi-plus btn-icon-prepend"></i>
                                    Ajouter
                                </button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class=" m-6 text-center">
                    Information sur le Medicament
                </h6>
                <form id="formLine" class="" action="{{ route('enregistre.commande') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @foreach ($produits as $idPharmacien)
                        <input type="hidden" name="pharmacien_id" value="{{ $idPharmacien['pharmacien_id'] }}">
                    @endforeach
                    <label for="numCommande">Numero de commande :</label>
                    
                    @if ($generedNumber->isNotempty()) 
                        <?php
                            $numero = $generedNumber[0]['num_commande'] + 1 ;
                        ?>
                        <input type="number" name="num_commande1" required class="form-control mb-2 mr-1 col-lg-3" placeholder="Numero du commande" value="{{ $numero }}">

                    @elseif ($generedNumber->isEmpty())

                        <input type="number" name="num_commande2" required class="form-control mb-2 mr-1 col-lg-3" placeholder="Numero du commande"
                        value="1">

                    @endif


                    <div id="formCommande" class="formCommande form-inline">

                    </div>
                    <div id="btnFinish" class="row fixed">
                        <div class="col-lg-12">

                        </div>
                        <div class="col-md-6 text-right">
                            <button type="reset" class="btn btn-inverse-danger btn-fw">
                                <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                Annuler
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button id="" type="button" onclick="enregistrerCommande()" class="btn btn-inverse-primary btn-fw">
                                <i class="mdi mdi-plus btn-icon-prepend"></i>
                                Terminer
                            </button>
                            <button id="btnSave" type="submit" style="display:none" class="btn btn-inverse-primary btn-fw">
                                <i class="mdi mdi-plus btn-icon-prepend"></i>
                                Enregistrer
                            </button>
                        </div>
                    </div>
                    <div id="MedecoCommande" class="col-lg-12">

                    </div>
                    <div id="btnSaved" class="col-lg-12" style="display:none">
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <button type="reset" class="btn btn-inverse-danger btn-fw">
                                    <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                    Annuler
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-inverse-primary btn-fw">
                                    <i class="mdi mdi-plus btn-icon-prepend"></i>
                                    Enregistrer
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection