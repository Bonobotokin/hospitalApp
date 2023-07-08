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
                    <input type="hidden" value="{{ $patient['consultation_id'] }}" name="consultation_id">
                    <input type="hidden" value="{{ $patient['patient_id'] }}" name="patient_id">
                    <input type="hidden" name="patient_nom" value="{{ $patient['nom'] }}">
                    <input type="hidden" value="{{ $patient['type_consultation_id'] }}" name="type_consultation_id">
                    <input type="hidden" value="{{ $patient['medecin'] }}" name="medecin_id">
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
                                            @foreach ($laboratoire as $liste)
                                            <option value="{{ $liste->designation_examens_labo }}">{{ $liste->designation_examens_labo }}</option>
                                            @endforeach
                                        </select>
                                        <button class="add btn btn-primary labo-list-add-btn">Add</button>
                                    </div>
                                    <div class="list-wrapper" id="contentAddLabo">
                                        <ul id="laboListe" class="d-flex flex-column-reverse text-white labo todo-list-custom">

                                        </ul>
                                        <div id="lsiteLabo" class="col-lg-12 form-inline lsiteLabo">

                                        </div>
                                        <div class="col-lg-12">
                                            <button id="validateLabo" type="button" onclick="saveAndvalideExamenLabo();" class="btn btn-info btn-block ">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="resultatExamens" style="display:none" class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="preview-subject">Resultat d'examens</h6>
                        </div>

                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Parametres </th>
                                            <th style="width:10%"> Valeurs de references </th>
                                            <th> Unite </th>
                                            <th style="width:20%"> Valeur </th>
                                            <th> Observation </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resultatLabo as $data)
                                        <tr>
                                            <td>{{$data['designation_examens_labo']}}</td>
                                            <td>{{$data['valeurs_referrences']}}</td>
                                            <td>{{$data['Unite']}}</td>
                                            <td>{{$data['designation_examens_labo']}}</td>
                                            <td>{{$data['observation_examens']}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>{{ $rapport[0]->details }}</p>
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
                                        @if ( $list['quantite'] > 50)
                                        <tr id="content_search_medicament" class="content_search" style="cursor:pointer">
                                            <td>{{ $list['num'] }}</td>
                                            <td>{{ $list['abrev'] }}</td>
                                            <td>{{ $list['type'] }}</td>
                                            <td>{{ $list['prix'] }}</td>
                                            <td>{{ $list['quantite'] }}</td>
                                        </tr>
                                        @elseif ( $list['quantite'] > 20)
                                        <tr style="background-color: #ffab00d6;color:white;">
                                            <td>{{ $list['num'] }}</td>
                                            <td>{{ $list['abrev'] }}</td>
                                            <td>{{ $list['type'] }}</td>
                                            <td>{{ $list['prix'] }}</td>
                                            <td>{{ $list['quantite'] }}</td>
                                        </tr>
                                        @elseif ( $list['quantite'] < 10) <tr style="background-color: red;color:white;">
                                            <td>{{ $list['num'] }}</td>
                                            <td>{{ $list['abrev'] }}</td>
                                            <td>{{ $list['type'] }}</td>
                                            <td>{{ $list['prix'] }}</td>
                                            <td>Epuiser</td>
                                            </tr>
                                            @endif
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
                                                <td class="text-right" id="PrixConsultaion"> {{ $patient['prix'] }} Ar </td>
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

                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($examen as $dataExamen)

                                            @foreach ($dataExamen as $value)
                                            <tr>
                                                <td>{{ $value['designation_examens_labo'] }}</td>
                                                <td class="text-right"> {{ $value['prix'] }} </td>
                                            </tr>
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <td>Total</td>
                                                <td id="totalLaboratoire" class="text-right"></td>
                                            </tr>
                                        </tfoot>
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
                                                <td class="text-right"> </td>
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
                                                <td colspan="2" class="text-right">Total</td>
                                                <td id="tFoot"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="factureTotal">Numero facture :</label>
                                    <input type="text" name="numFacture" class="form-control" placeholder="012345">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="factureTotal">Facture Total :</label>
                                    <input type="text" name="facture" id="facturePaye" class="form-control" placeholder="{{ $patient['prix'] }}">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row" style="margin:5% 0 5% 0; display:none;" id="sendBtn">

                        <div class="col-lg-6">
                            <button type="reset" class="btn btn-danger btn-block"><i class="mdi mdi-refresh btn-icon-prepend"></i> Annuler</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success btn-block"><i class="mdi mdi-plus btn-icon-prepend"></i> Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection




@section('script')
<script src="{{ asset('script/consultation.js') }}"></script>
<script src="{{ asset('script/examens_echographie.js')}}"></script>
<script src="{{ asset('script/examens_laboratoire.js')}}"></script>
<script src="{{ asset('script/symptomes.js') }}"></script>
<script src="{{ asset('script/diagnostic.js') }}"></script>
<script src="{{ asset('script/prescription.js')}}"></script>
<script src="{{ asset('script/payedFacture.js')}}"></script>
<script src="{{ asset('script/manupilation.js')}}"></script>

@endsection