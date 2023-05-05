@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li class="active"><a data-toggle="tab" href="#personnel" aria-expanded="true"><i class="notika-icon notika-house"></i> Personnel</a>
            </li>
            <li><a data-toggle="tab" href="#produits"><i class="notika-icon notika-mail"></i>Produits</a>
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
                <h4 class="card-title text-center"> Encaissement Journaliere </h4>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Numero</th>
                                <th> Date </th>
                                <th> Description </th>
                                <th> Montant </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($encaissement as $data)
                            <tr>
                                <td> {{ $data['num'] }} </td>
                                <td> {{ $data['date'] }} </td>
                                <td> {{ $data['designation'] }} </td>
                                <td> {{ $data['montant'] }} Ar </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total</th>
                                <th id="total"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection