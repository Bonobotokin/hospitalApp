@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="template-demo float-left">
                <h4 class="card-title">Narizafy Danielle<p>32 ans, Mpamboly</p>
                </h4>
            </div>
            <div class="template-demo float-right">
                <button type="button" id="consultationBtn" onclick="newConsultation()"
                    class="btn btn-inverse-primary btn-fw">Nouveaux Consultations</button>
                <button type="button" id="antecedantBtn" onclick="showAntecedant()"
                    class="btn btn-inverse-warning btn-fw">Antecedants</button>
                
            </div>
        </div>
        {{-- content New Consultation --}}
        <div class="col-md-4 grid-margin" id="listeMedicament">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <input type="text" class="form-control" placeholder="Search products">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Photoshop</td>
                                    <th>Product</th>
                                    <td>
                                        <div class="icon icon-box-success">

                                            1500
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Photoshop</td>
                                    <th>Product</th>
                                    <td>
                                        <div class="icon icon-box-warning">
                                            50
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Premier</td>
                                    <th>Product</th>
                                    <td>
                                        <div class="icon icon-box-danger">

                                            20
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin" id="cardConsultation">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 " style="margin-bottom: 30px">
                        <div class="template-demo">
                            <button type="button" onclick="showParametres()"
                                class="btn btn-inverse-primary btn-fw">Parametres & Symptomes</button>
                            <button type="button" onclick="examensConsultation()"
                                class="btn btn-inverse-info btn-fw">Examens</button>
                            <button type="button" onclick="examensResultaConsultation()"
                                class="btn btn-inverse-warning btn-fw">ResultatExamens</button>
                                <button type="button" onclick="diagnosticonsultation()"
                                    class="btn btn-inverse-success btn-fw">Diagnostic</button>
                            <button type="button" onclick="presciptionConsultation()"
                                class="btn btn-inverse-success btn-fw">Prescription</button>
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
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Taills</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Temperature</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tension Arteriere</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Pouls</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Frequence</td>
                                                <td class="text-right"> 70 </td>
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
                                <div class="add-items d-flex">
                                    <input type="text" class="form-control symptomesInput" placeholder="enter task..">
                                    <button class="add btn btn-primary symptomes-list-add-btn">Add</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse text-white symptomes todo-list-custom">

                                    </ul>
                                </div>
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
                                <div class="add-items d-flex">
                                    {{-- <input type="text" class="form-control echographieInput" placeholder="enter task.."> --}}
                                    <select class="js-example-basic-single echographieInput" style="width:100%">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AM">America</option>
                                        <option value="CA">Canada</option>
                                        <option value="RU">Russia</option>
                                    </select>
                                    <button class="add btn btn-primary echographie-list-add-btn">Add</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse text-white echographie todo-list-custom">

                                    </ul>
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
                                                Obcaecati, ratione?</td>
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
                                <div class="add-items d-flex">
                                    <input type="text" class="form-control diagnosticInput" placeholder="Entrer ici votre diagnostic">

                                    <button class="add btn btn-primary diagnostic-list-add-btn">Add</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse text-white diagnostic todo-list-custom">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prescription" style="display:none" class="row">
                        <div class="col-md-12 text-center">
                            <h6 class="preview-subject">Prescription</h6>
                        </div>
                        <div class="col-md-7">
                            <h6 class="preview-subject">Medicaments</h6>
                            <div class="template-demo">
                                <div class="add-items d-flex">
                                    {{-- <input type="text" class="form-control echographieInput" placeholder="enter task.."> --}}
                                    <select class="js-example-basic-single prescriInput" style="width:100%">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AM">America</option>
                                        <option value="CA">Canada</option>
                                        <option value="RU">Russia</option>
                                    </select>
                                    <button class="add btn btn-primary prescri-list-add-btn">Add</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse text-white prescri todo-list-custom">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h6 class="preview-subject">Laboratoire</h6>
                            <div class="template-demo">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- content Antecedants  --}}
        <div class="col-md-4 grid-margin" id="listeAntecedant" style="display: none">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <input type="text" class="form-control" placeholder="Search products">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Photoshop</td>
                                    <th>Product</th>
                                </tr>
                                <tr>
                                    <td>Photoshop</td>
                                    <th>Product</th>
                                </tr>
                                <tr>
                                    <td>Premier</td>
                                    <th>Product</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin" id="cardAntecedant" style="display: none">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 " style="margin-bottom: 30px">
                            <div class="template-demo">
                                <button type="button" onclick="showParametres()"
                                    class="btn btn-inverse-primary btn-fw">Parametres & Symptomes</button>
                                <button type="button" class="btn btn-inverse-info btn-fw">Examens</button>
                                <button type="button" class="btn btn-inverse-success btn-fw">Prescription</button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h6 class="preview-subject">Parametres</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Poids</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Taills</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Temperature</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tension Arteriere</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Pouls</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Frequence</td>
                                                <td class="text-right"> 70 </td>
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
                                <div class="add-items d-flex">
                                    <input type="text" class="form-control symptomesInput" placeholder="enter task..">
                                    <button class="add btn btn-primary symptomes-list-add-btn">Add</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse text-white symptomes todo-list-custom">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h6 class="preview-subject">Examens</h6>
                            <div class="template-demo">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Poids</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Taills</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Temperature</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tension Arteriere</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Pouls</td>
                                                <td class="text-right"> 70 </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Frequence</td>
                                                <td class="text-right"> 70 </td>
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
                                <div class="add-items d-flex">
                                    <input type="text" class="form-control symptomesInput" placeholder="enter task..">
                                    <button class="add btn btn-primary symptomes-list-add-btn">Add</button>
                                </div>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse text-white symptomes todo-list-custom">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
