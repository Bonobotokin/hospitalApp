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
                    <h4 class="card-title text-center">Liste des Produits</h4>
                    <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                        data-target="#newFourniture">
                        Nouveaux Fourniture
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Nom </th>
                                    <th> Abreviation </th>
                                    <th> Fabriquant </th>
                                    <th> Type </th>
                                    <th> Prix vente U </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $produitListe as $data )
                                    <tr>
                                        <td> {{ $data['nom'] }} </td>
                                        <td> {{ $data['abrev'] }} </td>
                                        <td> {{ $data['fabriquant'] }} </td>
                                        <td> {{ $data['types'] }} </td>
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
