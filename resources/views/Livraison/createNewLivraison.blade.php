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
<form id="formLine" class="" action="{{ route('saveLivraison') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="formLivraison" class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <h4 class="card-title m-10 pd-10 text-center">
                    <big>NOUVEAUX ACHAT DE PRODUITS MEDICALE</big>
                </h4>
                <div class="card-body">
                    <div class="row ">

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Numero de facture :</label>
                                <input name="numFacture" type="number" class="form-control" placeholder="0012" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Numero de livraison :</label>
                                <input type="number" class="form-control" name="numeroLivraison" placeholder="Numero de livraison">
                            </div>
                        </div>
                    </div>

                    <p class="card-desription text-center">Information sur le fournisseur</p>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Raison Sociale:</label>
                                <input type="text" name="fournisseur[raison]" class="form-control" placeholder="Raison Sociale" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Activite:</label>
                                <input type="text" name="fournisseur[activite]" class="form-control" placeholder="Activite">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Adresse:</label>
                                <input type="text" name="fournisseur[adresse]" class="form-control" placeholder="Adresse" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">NIF:</label>
                                <input type="number" name="fournisseur[nif]" class="form-control" placeholder="NIF" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Numero du Compte:</label>
                                <input type="number" name="fournisseur[numero]" class="form-control" placeholder="Raison Sociale" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Telephone:</label>
                                <input type="number" name="fournisseur[telephone]" class="form-control" placeholder="Telephone" />
                            </div>
                        </div>
                    </div>

                    <p class="card-desription text-center">Information sur les Produit </p>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 grid-margin" id="listeMedicament">

                                <div class="table-responsive">
                                    <input onkeyup="searchIng()" type="text" id="inputSearch" class="form-control" placeholder="Search products">
                                    <table id="tableCommandeProduits" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th> Code </th>
                                                <th> Nom</th>
                                                <th> Categorie</th>
                                                <th> Type</th>
                                                <th> Abrev</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myUL">
                                            
                                            @foreach ($produits as $data)
                                            <tr id="content_search" onclick="getElement()" class="content_search" style="cursor:pointer">
                                                <td id="idProduits"> {{ $data['num'] }} </td>
                                                <td id="nom"> {{ $data['nom'] }} </td>
                                                <td id="categorie"> {{ $data['categorie'] }} </td>
                                                <td id="type"> {{ $data['types'] }} </td>
                                                <td id="abrev"> {{ $data['abrev'] }} </td>
                                                <td id="categorie" style="display:none"> {{ $data['categorie'] }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-8" id="cardConsultation">
                                <blockquote class="blockquote blockquote-primary">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <input id="codeProduits" type="hidden" class="form-control" type="number" name="numProduits">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Designation :</label>
                                                        <input id="designation" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Categorie :</label>
                                                        <input id="categorieValue" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Type :</label>
                                                        <input id="typeValue" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h6 class=" m-6 text-center">
                                                Information sur le commande :
                                            </h6>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="Conditionnement">Condit : </label>
                                                        <input id="conditionnement" type="text" placeholder="Conditionnement" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="Quantite">Qt Livrer: </label>
                                                        <input id="quantite" type="number" placeholder="Quantite totale" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="Quantite">Total : </label>
                                                        <input id="total" type="number" placeholder="Quantiter a commander" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Prix:</label>
                                                        <input type="number" class="form-control" name="" id="prix" placeholder="Prix">

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
                                                    <button type="button" onclick="addProduitLivraison()" class="btn btn-inverse-primary btn-fw">
                                                        <i class="mdi mdi-plus btn-icon-prepend"></i>
                                                        Ajouter
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div class="col-lg-12 mt-2">

                                            <div id="formCommande" class="formCommande form-inline">

                                            </div>
                                            <div id="btnContent" class="row fixed">
                                                <div class="col-lg-12">
                                                    {{-- @foreach ($produits as $num)
                                                            <input type="hidden" name="magasinNun"
                                                                value="{{ $num['num'] }}">
                                                    @endforeach --}}

                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <button id="btnreset" type="reset" class="btn btn-inverse-danger btn-fw">
                                                        <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                                        Annuler
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button id="btnFinish" type="button" onclick="savenedicamentBt()" class="btn btn-inverse-primary btn-fw">
                                                        <i class="mdi mdi-plus btn-icon-prepend"></i>
                                                        Terminer
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="achatMedoc" class="col-lg-12">

                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</form>

@endsection