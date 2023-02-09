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
                    <h4 class="card-title text-center">Liste des Produits en Stock</h4>
                    <!-- <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                        data-target="#newFourniture">
                        Nouveaux Fourniture
                    </button> -->
                    <br><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Nom </th>
                                    <th> Abreviation </th>
                                    <th> Conditionnement </th>
                                    <th> Quantite </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $produitListe as  $key => $list)
                                    
                                    <tr>
                                        <td>{{ $list['nom'] }}</td>
                                        <td>{{ $list['abrev'] }}</td>
                                        <td>{{ $list['conditionnement'] }}</td>
                                        <td>{{ $list['quantite'] }}</td>
                                        <td>
                                            <a href="http://" class="btn btn-outline-primary btn-fw">
                                                Details
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
