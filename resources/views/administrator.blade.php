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

@endsection