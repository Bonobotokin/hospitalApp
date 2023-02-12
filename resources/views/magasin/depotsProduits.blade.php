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
                    <h4 class="card-title text-center">Liste des Produits </h4>
                    <a href="{{ route('create.achat.produits') }}" type="button" class="btn btn-outline-primary btn-fw">
                        Nouveaux Achat
                    </a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Nom </th>
                                    <th> Conditionnement </th>
                                    <th> Quantite </th>
                                    <th> Prix vente U </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $depots as $data )
                                    <tr>
                                        <td> {{ $data['nom'] }}; {{ $data['abrev'] }} </td>
                                        <td> {{ $data['conditionnement'] }} </td>
                                        <td> {{ $data['quantite'] }} </td>
                                        <td> {{ $data['prix_vente'] }} Ar </td>
                                        <td>
                                            <abs type="button" class="btn btn-primary btn-icon-text" >
                                                Plus details
                                                <i class="mdi mdi-refresh float-right"></i>
                                            </a>
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
