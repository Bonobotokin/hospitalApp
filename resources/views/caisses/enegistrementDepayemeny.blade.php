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
    <div class="col-lg-6 col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">

                <div class="card-title text-center" id="titre_facture">
                    facture de {{$facture['dataDetails']['patient']}}
                </div>
                <div class="table-responsive">
                    <!-- <div class="preview-item text-center" style="margin: 5% 0 5% 0;" id="ListeBtn">
                            <button disabled="disabled" type="disasble" id="enregistreBtn" class="btn btn-info mr-2">enregistrer le payement</button>
                            <button type="button" id="btnUpdate" class="btn btn-warning btn-fw" data-toggle="modal" data-target="#askeUpdate">
                                Modifier le facture
                            </button>
                            <button type="submit" id="validerBtn" class="btn btn-primary mr-2">valider</button>
                        </div> -->
                    <table id="tableFactureListe" class="table table-bordered table-striped tableFactureListe">
                        <thead>
                            <tr>
                                <th class="text-center">Designation</th>
                                <th style="width:15%" class="text-center">Quantite</th>
                                <th class="text-center">Montant</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-center" colspan="2">Consultation</td>
                                <td id="consultation_prix" class="text-center">{{$facture['dataDetails']['consultation_prix']}}</td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">Soin</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">Laboratoire</td>
                                <td></td>
                            </tr>
                            @foreach ($facture['dataDetails']['produits'] as $produits )

                            <tr>

                                <td id="produit_nom">
                                    {{ $produits['produit_nom'] }}
                                    <input type="hidden" name="produit[produit_nom]" value="{{ $produits['produit_nom'] }}">
                                </td>
                                <td style="width:15%" id="quantite" class="text-center">
                                    <input type="number" name="produit[quantite]" disabled id="prdouitDesable" class="form-control text-center" value="{{ $produits['quantite'] }}">

                                </td>
                                <td id="prix_totale" class="text-center">{{ $produits['quantite']  * $produits['prix_unitaire']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="ListeBtnupdate">

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">

                <div class="card-title text-center" id="titre_facture">
                    Formulaire de payement
                </div>
                <div class="table-responsive">

                    <form action="{{ route('enregistrement.Facture') }}" method="post">
                        @csrf

                        <table id="tableFactureListe" class="table table-bordered table-striped tableFactureListe">
                            <tfoot>

                                <tr>

                                    <td colspan="2" class="text-center">Montant a payer</td>


                                    <td id="prixTotal" class="text-center">
                                        @if ($facture['dataDetails']['reste'] != 0)

                                        {{$facture['dataDetails']['reste']}}
                                        @else

                                        {{$facture['dataDetails']['prixTotal'] - $facture['dataDetails']['montant']}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2" class="text-center">Total</td>

                                    <td id="totalMontantDefault" class="text-center">
                                        @if ($facture['dataDetails']['reste'] != 0)

                                        {{$facture['dataDetails']['reste']}}
                                        @else

                                        {{$facture['dataDetails']['prixTotal'] - $facture['dataDetails']['montant']}}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="preview-item border-bottom" style="margin:5% 0 5% 0">
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" style="max-width: 100%;">Montant paye</span>
                                    </div>
                                    <input onkeyup="getMontantReste();" type="number" class="form-control" name="montantPayed" id="montantPayed" value="{{ 0 + old('montantPayed') }}" required autocomplete="montantPayed" autofocusaria-label="Repayed">
                                    @error('montantPayed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">Ar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="preview-item border-bottom">
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" style="max-width: 100%;">Reste a payer</span>
                                    </div>
                                    <input type="number" class="form-control" value="{{$facture['dataDetails']['reste']}}" name="restePayed" id="restePayed" aria-label="Repayed">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Ar</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="numFacture" value="{{$facture['dataDetails']['facture']}}">
                        <input type="hidden" name="description" value="Payement de la facture de {{ $facture['dataDetails']['matricule'] }}">
                        @if ($facture['dataDetails']['reste']  != 0)

                        <input type="hidden" name="totalMontantDefault" id="totalMontantDefault" value="{{$facture['dataDetails']['reste'] }}">
                        @else

                        <input type="hidden" name="totalMontantDefault" id="totalMontantDefault" value="{{$facture['dataDetails']['prixTotal'] - $facture['dataDetails']['montant']}}">
                        @endif

                        <div class="form-group text-center" style="margin: 5%;">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection