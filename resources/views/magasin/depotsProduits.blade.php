@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li class="active">
                <a data-toggle="tab" href="#personnel" aria-expanded="true">
                    <i class="notika-icon notika-house"></i> Depots</a>
            </li>
            <li>
                <a data-toggle="tab" href="#produits">
                    <i class="notika-icon notika-mail"></i>Achat Produits</a>
            </li>
            <li>
                <a data-toggle="tab" href="#produits">
                    <i class="fa fa-truck"></i>Livraison Produits</a>
            </li>
            <li>
                <a data-toggle="tab" href="#produits">
                    <i class="notika-icon notika-mail"></i>Commande Produits</a>
            </li>
        </ul>
        <div class="tab-content custom-menu-content">
            <div id="personnel" class="tab-pane in notika-tab-menu-bg animated flipInX active">
                <ul class="notika-main-menu-dropdown">
                    <li><a href="{{ route('personnel.liste') }}">Liste Personnel</a>
                    </li>
                    <li><a href="{{ route('personnel.nouveaux') }}">Nouveaux Personnel</a>
                    </li>
                </ul>
            </div>
            <div id="produits" class="tab-pane notika-tab-menu-bg animated flipInX">
                <ul class="notika-main-menu-dropdown">
                    <li><a href="{{ route('produits.achat') }}">Achat des Produits</a>
                    </li>
                    <li><a href="{{ route('All.Livraison') }}">Livraison des Produits</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
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
