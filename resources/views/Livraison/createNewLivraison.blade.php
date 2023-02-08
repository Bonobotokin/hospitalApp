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
    <form id="formLine" class="" action="{{ route('store.achat.produits') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="formLivraison" class="row" >
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <h4 class="card-title m-10 pd-10 text-center">
                        <big>NOUVEAUX ACHAT DE PRODUITS MEDICALE</big>
                    </h4>
                    <div class="card-body">
                        

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-4 grid-margin" id="listeMedicament" >

                                    <div class="table-responsive">
                                        <input onkeyup="searchIng()" type="text" id="inputSearch" class="form-control"
                                            placeholder="Search products">
                                        <table id="tableCommandeProduits" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> Code </th>
                                                    <th>Nom</th>
                                                    <th>Type</th>
                                                    <th>Abrev</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myUL">
                                                {{-- @dd($produits) --}}
                                                @foreach ($produits as $data)
                                                    <tr id="content_search" onclick="getElement()" class="content_search"
                                                        style="cursor:pointer">
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
                                
                                <div class="col-md-8" id="cardConsultation" >
                                    <blockquote class="blockquote blockquote-primary">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class=" mb-5 text-center">
                                                    Information sur le Medicament
                                                </h5>
                                                <div class="row">
                                                    <input id="codeProduits" type="hidden" class="form-control"
                                                        type="number" name="numProduits">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Designation :</label>
                                                            <input id="designation" type="text"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Type :</label>
                                                            <input id="categorieValue" type="text"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6 class=" m-6 text-center">
                                                    Information sur le commande
                                                </h6>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="Conditionnement">Conditionnement : </label>
                                                            <input id="conditionnement" type="text"
                                                                 placeholder="Conditionnement"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="Quantite">Quantite Acheter: </label>
                                                            <input id="quantite" type="number"
                                                                placeholder="Quantiter a commander" class="form-control">
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
                                                        <button type="button" onclick="addMedicamentBtn()"
                                                            class="btn btn-inverse-primary btn-fw">
                                                            <i class="mdi mdi-plus btn-icon-prepend"></i>
                                                            Ajouter
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="col-lg-12 mt-2">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="">Numero d'achat :</label>
                                                        <input type="number" class="form-control" name="numAchat" placeholder="Numero de l'achat">
                                                    </div>
                                                </div>
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
                                                        <button id="btnreset" type="reset"
                                                            class="btn btn-inverse-danger btn-fw">
                                                            <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                                            Annuler
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button id="btnFinish" type="button"
                                                            onclick="savenedicamentBt()"
                                                            class="btn btn-inverse-primary btn-fw">
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
