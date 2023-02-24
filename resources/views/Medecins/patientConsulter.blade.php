@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="template-demo float-left">
            <h4 class="card-title">{{ $patient['nom'] }}
                <p>{{ $patient['age'] }} ans, {{ $patient['profession'] }}</p>
            </h4>
        </div>
        <div class="template-demo float-right">
            <button type="button" id="consultationBtn" onclick="newConsultation()" class="btn btn-inverse-primary btn-fw">Nouveaux Consultations</button>
            <button type="button" id="antecedantBtn" onclick="showAntecedant()" class="btn btn-inverse-warning btn-fw">Antecedants</button>

        </div>
    </div>
    {{-- content New Consultation --}}
    <div class="col-lg-12 col-md-6 grid-margin" id="cardConsultation">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('storePatient.consultation') }}" method="POST">
                    @csrf
                    <div class="col-md-12 " style="margin-bottom: 30px">
                        <div class="template-demo">
                            <button type="button" onclick="showParametres()" class="btn btn-inverse-primary btn-fw">Parametres & Symptomes</button>
                            <button type="button" onclick="examensConsultation()" class="btn btn-inverse-info btn-fw">Examens</button>
                            <button type="button" onclick="examensResultaConsultation()" class="btn btn-inverse-warning btn-fw">ResultatExamens</button>
                            <button type="button" onclick="diagnosticonsultation()" class="btn btn-inverse-success btn-fw">Diagnostic</button>
                            <button type="button" onclick="presciptionConsultation()" class="btn btn-inverse-success btn-fw">Prescription</button>
                            <button type="button" onclick="facturationConsultation()" class="btn btn-inverse-primary btn-fw">Facture</button>
                        </div>
                    </div>
                    <div id="parametre" class="row">
                        <div class="col-md-7">
                            <h6 class="preview-subject">Parametres</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Poids</td>
                                                <td class="text-right"> {{ $parametre['poids'] }} </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Taills</td>
                                                <td class="text-right"> {{ $parametre['taills'] }} </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Temperature</td>
                                                <td class="text-right"> {{ $parametre['temperature'] }} </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tension Arteriere</td>
                                                <td class="text-right"> {{ $parametre['tension'] }} </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Pouls</td>
                                                <td class="text-right"> {{ $parametre['pouls'] }} </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Frequence</td>
                                                <td class="text-right"> {{ $parametre['frequence'] }} </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h6 class="preview-subject">Symptomes</h6>
                            <div class="template-demo">
                                <textarea name="symptomes" placeholder="Liste des symptomes ... " class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="examens" style="display:none" class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="preview-subject">Examens</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="preview-subject">Echographie</h6>
                            <div class="template-demo">
                                <div class="row">
                                    <div class="col-lg-4 form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Remember me
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="col-lg-4 form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Remember me
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="col-lg-4 form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Remember me
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="preview-subject">Laboratoire</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <div class="add-items d-flex">
                                        <select class="js-example-basic-single laboInput" style="width:100%">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="AM">America</option>
                                            <option value="CA">Canada</option>
                                            <option value="RU">Russia</option>
                                        </select>
                                        <button class="add btn btn-primary labo-list-add-btn">Add</button>
                                    </div>
                                    <div class="list-wrapper">
                                        <ul class="d-flex flex-column-reverse text-white labo todo-list-custom">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="resultatExamens" style="display:none" class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="preview-subject">Resultat d'examens</h6>
                        </div>
                        <div class="col-md-7">
                            <h6 class="preview-subject">Echographie</h6>
                            <div class="template-demo">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>
                                            type
                                        </th>
                                        <th>
                                            observation
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cellule</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, ipsum
                                                dignissimos nemo similique modi pariatur, omnis consequatur libero
                                                distinctio minus dicta laborum facere neque totam officiis ea incidunt?
                                                Obcaecati, ratione?
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h6 class="preview-subject">Laboratoire</h6>
                            <div class="template-demo">

                            </div>
                        </div>
                    </div>
                    <div id="diagnostic" style="display:none" class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="preview-subject">Diagnostic</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="template-demo">
                                <textarea name="diagnostic" placeholder="Diagnostic ... " class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="prescription" style="display:none" class="row">

                        <div class="col-lg-6">
                            <h6 class="preview-subject text-center">Listes des Medicaments</h6>
                            <div class="table-responsive">
                                <input type="text" class="form-control" placeholder="Search products">
                                <table id="tableMedicament" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Num</th>
                                            <th>Nom</th>
                                            <th>Type</th>
                                            <th>Prix</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody id="medicamentUl">
                                        @foreach ( $produitListe as $key => $list)
                                        <tr id="content_search_medicament" onclick="addPrecription()">
                                            <td>{{ $list['num'] }}</td>
                                            <td>{{ $list['abrev'] }}</td>
                                            <td>{{ $list['type'] }}</td>
                                            <td>{{ $list['prix'] }}</td>
                                            <td>{{ $list['quantite'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <h6 class="preview-subject text-center">Medicament a prescrire</h6>
                            <div class="row">
                                <div id="medicamentForm" class="medicamentForm form-inline">

                                </div>

                                <div id="listeMedicamentPrescription" class="col-lg-12 listeMedicamentPrescription form-inline">

                                </div>
                                <div class="col-md-12" style="padding:25px">
                                    <div class="form-group">
                                        <button type="button" onclick="btnAnnuler()" class="btn btn-danger btn-fw">
                                            Annuler
                                        </button>
                                        <button type="button" onclick="btnvalide()" class="btn btn-primary btn-fw">
                                            Valider la liste
                                        </button>
                                    </div>
                                </div>

                                <div id="posologie" class="posologie">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div id="formPrescription" class="formPrescription form-inline">

                            </div>
                        </div>
                    </div>
                    <div id="facture" class="row" style="display:none">
                        <div class="col-lg-3">
                            <h6 class="preview-subject">Consultation</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Consultation</td>
                                                <td class="text-right"> 70 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h6 class="preview-subject">Examen Laboratoire</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Null</td>
                                                <td class="text-right">  </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h6 class="preview-subject">Examen Echographie</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Null</td>
                                                <td class="text-right">  </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h6 class="preview-subject">Medicament</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Qt</th>
                                                <th>Prix</th>
                                            </tr>
                                        </thead>
                                        <tbody id="factureMedicament">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">Total</td>
                                                <td id="tFoot"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <button type="reset" class="btn btn-inverse-danger btn-fw">
                                    <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                    Annuler
                                </button>
                            </div>
                            <div class="col-md-6 text-center">
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