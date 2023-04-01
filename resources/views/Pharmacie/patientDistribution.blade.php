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
<div class="profile-name">
    <h5 class="mb-0 font-weight-normal">{{$liste['nom']}}</h5>
    <span>{{ $liste['matricule'] }}</span>
</div>
<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listes des Medicament</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Quantite</th>
                                <th>Qt Distribbuer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $liste['produits'] as $dataProd)
                            <tr>
                                <td>{{ $dataProd['produit_nom'] }}</td>
                                <td>Photoshop</td>
                                <td>
                                    <input type="number" class="form-control">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="template-demo">
                    <button type="button" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-alert btn-icon-prepend"></i> 
                        Annuler 
                    </button>

                    <button type="button" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Enregistrer & distribuer </button>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Posologie</h4>

                </p>
                <blockquote class="blockquote">
                    <p class="mb-0">
                        {{$liste['posologie']}}
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</div>

@endsection