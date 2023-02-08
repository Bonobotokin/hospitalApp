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
        <div id="commandeList"  class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">
                            <big>BON D'ACHAT</big>
                            <br><br>
                            <p class="text-left">
                                Numero : 0 {{ $achat[0]['numAchat'] }}
                                
                                <br>
                                Date : {{ $achat[0]['date'] }}
                                <br>
                                Validate par : {{ $achat[0]['nom_personneles'] }} & {{ $achat[0]['demandeur'] }}
                            </p>
                        </h4>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Designation </th>
                                        <th> Conditionnement </th>
                                        <th> Quantiter </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($achat as $liste)
                                        <tr>
                                            <td>{{ $liste['designation'] }}</td>
                                            <td>{{ $liste['conditionnnement_achat'] }}</td>
                                            <td>{{ $liste['quantite_achat'] }}</td>
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
