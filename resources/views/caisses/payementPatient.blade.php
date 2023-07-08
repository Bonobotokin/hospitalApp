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
    <div class="col-lg-6 col-md-6 grid-margin" id="cardFactureListe">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="preview-subject text-center">Listes des Factures </h6>
                </div>
                <div class="table-responsive">
                    <table id="tableFactureListe" class="table table-bordered table-striped tableFactureListe">
                        <thead>
                            <tr>
                                <th>NumFacture</th>
                                <th>Matricule</th>
                                <th>Nom patient</th>
                                <!-- <th>Montant a payer</th>
                                <th>Action</th> -->
                            </tr>
                        </thead>

                        <tbody id="listePatient">
                            @foreach ($factures as $facture)
                            @if (($facture['reste']))
                            <tr  style="background: #780da1;color: white;cursor:pointer">
                                <td>
                                    @if ($facture['facture'] < 10) facture 000{{ $facture['facture'] }} @elseif ($facture['facture'] < 100) facture 00{{ $facture['facture'] }} @elseif ($facture['facture'] < 1000) facture 0{{ $facture['facture'] }} @else facture {{ $facture['facture'] }} @endif </td>
                                <td>{{ $facture['matricule'] }}</td>
                                <td id="patient_nom">{{ $facture['patient'] }}</td>
                                <!-- <td id="prixTotal" >{{$facture['prixFacture']}} Ar</td> -->
                                <!-- <td>
                                    <a  href="{{ route('patient.reglement.facture', ['numFacture' => $facture['facture']]) }}"
                                        type="button" class="btn btn-primary btn-icon-text">
                                        Payer
                                        <i class="mdi mdi-money float-right"></i>
                                    </a>
                                </td> -->
                            </tr>
                            @else
                            <tr style="cursor: pointer;" data-facture="{{ $facture['facture'] }}" style="cursor:pointer">
                                <td>
                                    @if ($facture['facture'] < 10) facture 000{{ $facture['facture'] }} @elseif ($facture['facture'] < 100) facture 00{{ $facture['facture'] }} @elseif ($facture['facture'] < 1000) facture 0{{ $facture['facture'] }} @else facture {{ $facture['facture'] }} @endif </td>
                                <td>{{ $facture['matricule'] }}</td>
                                <td id="patient_nom">{{ $facture['patient'] }}</td>
                                <!-- <td id="prixTotal" >{{$facture['prixTotal']}} Ar</td> -->
                                <!-- <td>
                                    <a  href="{{ route('patient.reglement.facture', ['numFacture' => $facture['facture']]) }}"
                                        type="button" class="btn btn-primary btn-icon-text">
                                        Payer
                                        <i class="mdi mdi-money float-right"></i>
                                    </a>
                                </td> -->
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="carte-facture" class="col-lg-6 grid-margin stretch-card">
        <!-- ... Contenu de la deuxième carte ... -->

        <div class="card">
            <div class="card-body">

                <div class="card-title text-center" id="titre_facture">
                    Payement
                </div>
               <div class="form">
                
               </div>
            </div>
        </div>
    </div>
</div>
@endsection