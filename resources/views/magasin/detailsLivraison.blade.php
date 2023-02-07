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
                        <big>BON DE RECEPTION</big>
                        <br><br>
                        <p>
                            Numero de Bon  : 0 {{ $details[0]['num_livraison'] }}
                            <br>
                            Numero de Facture : {{ $details[0]['numFacture'] }}
                            <br>
                            Date : {{ $details[0]['date'] }}
                            <br>
                            type de livraison : {{ $details[0]['type'] }}
                        </p>
                    </h4>
                    @if( $details[0]['validate'] == 0)
                        <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                            data-target="#uupdateDepot">
                            Valider le livraison
                        </button>
                    @endif
                    <div class="modal fade" id="uupdateDepot">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="text-center"> Enregistrer la livraison </h4>
                                </div>
                                <div class="modal-body">
                                    <form class="forms-sample" action="{{ route('valider_livraison.update_depot') }}" method="post">
                                        @csrf
                                        <input type="number" name="numLivraison" value="{{ $details[0]['num_livraison'] }}">
                                        <blockquote class="blockquote blockquote-primary">
                                            <p class="text-warning">
                                                Attention si vous valider ce livraison, Il se peut que votre depot se metreras a jour
                                            </p>                                                            
                                        </blockquote>
                                        <div class="form-group text-center">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="table-responsive">
                        
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Designation </th>
                                    <th> Conditionnement </th>
                                    <th> Quantiter </th>
                                    <th> Prix </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $liste)
                                    <tr>
                                        <td>
                                            {{ $liste['designation'] }}
                                            <input type="hidden"class="form-control" value="{{ $liste['designation'] }}">
                                        </td>
                                        <td>
                                            {{ $liste['conditionnements'] }}
                                            <input type="hidden"class="form-control" value="{{ $liste['conditionnements'] }}">
                                        </td>
                                        <td>
                                            {{ $liste['quantite'] }}
                                            <input type="hidden"class="form-control" value="{{ $liste['quantite'] }}">
                                        </td>
                                        <td>
                                            {{ $liste['prix'] }}
                                            <input type="hidden"class="form-control" value="{{ $liste['prix'] }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
