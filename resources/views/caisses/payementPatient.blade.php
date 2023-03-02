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
    <div class="col-lg-12 col-md-6 grid-margin" id="cardConsultation">
        <div class="card">
            <div class="card-body">
                <h6 class="preview-subject text-center">Listes des Patient</h6>
                <div class="table-responsive">
                    <table id="" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NumFacture</th>
                                <th>Matricule</th>
                                <th>Nom patient</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="medicamentUl">
                            @foreach ($factures as $facture)
                            <tr>
                                <td>{{ $facture['facture'] }}</td>
                                <td>{{ $facture['matricule'] }}</td>
                                <td>{{ $facture['patient'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-icon-text" data-toggle="modal" data-target="#payed{{ $facture['id'] }}">
                                        Payer
                                        <i class="mdi mdi-refresh float-right"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="payed{{ $facture['id'] }}">
                                <div class="modal-dialog" style="width:30%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title ">
                                                Payement de la facture de {{ $facture['patient'] }}
                                            </h4>
                                            <button style="color:#e32c2c" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <form action="{{ route('enregistrement.Facture') }}" method="post">
                                                        @csrf
                                                        <div class="preview-list">
                                                            <div class="preview-item border-bottom">
                                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                                    <div class="flex-grow">
                                                                        <h6 class="preview-subject">Consultation</h6>
                                                                    </div>
                                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                        <p class="text-muted">{{ $facture['consultation_prix'] }} Ar</p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            @foreach ($facture['produits'] as $produit)
                                                            <div class="preview-item border-bottom">
                                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                                    <div class="flex-grow">
                                                                        <h6 class="preview-subject">{{$produit['produit_nom']}}</h6>
                                                                    </div>
                                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                        <p class="text-muted">{{ $produit['prix_totale'] }} Ar</p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            <div class="preview-item border-bottom">
                                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                                    <div class="flex-grow">
                                                                        <h6 class="preview-subject">Total </h6>
                                                                    </div>
                                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                        <p class="preview-subject">{{ $facture['montant'] }} Ar</p>
                                                                        <input type="hidden" name="id" value="{{ $facture['id'] }}">
                                                                        <input type="hidden" id="totalMontantDefault" value="{{ $facture['montant'] }}">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="preview-item border-bottom">
                                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-primary text-white">Payement</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="montantPayed" id="montantPayed" onkeyup="getMonantReste()" aria-label="montPayed" value="{{ $facture['montant'] }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="preview-item border-bottom">
                                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-warning text-white">Reste</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="RestePayed" id="RestePayed" aria-label="Repayed" placeholder="0000.00">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="preview-item border-bottom">                                                            
                                                                <button type="submit" class="btn btn-dark mr-2">Annuler</button>
                                                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection