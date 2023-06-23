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
    <div class="col-lg-12 col-md-6 grid-margin" id="cardFactureListe">
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
                                <th>Montant a payer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody id="listePatient">
                            @foreach ($factures as $facture)
                            @if (($facture['reste']))
                            <tr onclick="patientPayedFactures()" style="background: #780da1;color: white;cursor:pointer">
                                <td>
                                    @if ($facture['facture'] < 10) facture 000{{ $facture['facture'] }} @elseif ($facture['facture'] < 100) facture 00{{ $facture['facture'] }} @elseif ($facture['facture'] < 1000) facture 0{{ $facture['facture'] }} @else facture {{ $facture['facture'] }} @endif </td>
                                <td>{{ $facture['matricule'] }}</td>
                                <td id="patient_nom">{{ $facture['patient'] }}</td>
                                <td id="prixTotal" >{{$facture['prixFacture']}} Ar</td>
                                <td>
                                    <a  href="{{ route('patient.reglement.facture', ['numFacture' => $facture['facture']]) }}"
                                        type="button" class="btn btn-primary btn-icon-text">
                                        Payer
                                        <i class="mdi mdi-money float-right"></i>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr onclick="patientPayedFacture()" style="cursor:pointer">
                                <td >
                                    @if ($facture['facture'] < 10) facture 000{{ $facture['facture'] }} @elseif ($facture['facture'] < 100) facture 00{{ $facture['facture'] }} @elseif ($facture['facture'] < 1000) facture 0{{ $facture['facture'] }} @else facture {{ $facture['facture'] }} @endif </td>
                                <td>{{ $facture['matricule'] }}</td>
                                <td id="patient_nom">{{ $facture['patient'] }}</td>
                                <td id="prixTotal" >{{$facture['prixTotal']}} Ar</td>
                                <td>
                                    <a  href="{{ route('patient.reglement.facture', ['numFacture' => $facture['facture']]) }}"
                                        type="button" class="btn btn-primary btn-icon-text">
                                        Payer
                                        <i class="mdi mdi-money float-right"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-6 col-md-6 grid-margin" id="add_facture_{{ $facture['facture'] }}" style="">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center" id="titre_facture">
                    facture de 
                </div>
                <div class="table-responsive">
                    <table id="tableFactureListe" class="table table-bordered table-striped tableFactureListe">
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Quantite</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center">Consultation</td>
                                <td id="consultation_prix" class="text-center"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">Soin</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">Laboratoire</td>
                                <td></td>
                            </tr>
                            <tr>

                                <td id="produit_nom"></td>
                                <td id="quantite" class="text-center"></td>
                                <td id="prix_totale" class="text-center"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <td colspan="2" class="text-center">Total</td>

                            <td id="prixTotal"></td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection