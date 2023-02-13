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
                    <h4 class="card-title text-center">Liste des Achats</h4>
                    <a href="{{ route('create.achat.produits') }}" type="button" class="btn btn-outline-primary btn-fw">
                        Nouveaux Achat
                    </a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="example3" class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Numero </th>
                                    <th> Date </th>
                                    <th> Observation </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liste as $achatListe)
                                    <tr>
                                        <td> 0 {{ $achatListe['numAchat'] }}</td>
                                        <td>{{ $achatListe['date'] }}</td>
                                        <td>
                                            <?php
                                                if($achatListe['ressut'] == 0)
                                                {
                                            ?>
                                                <div class="text-warning">
                                                    En attente
                                                </div>
                                            <?php
                                                }
                                                else {
                                            ?>
                                                <div class="text-success">
                                                    Livrer
                                                </div>
                                            <?php
                                                }
                                            ?>                                        
                                        </td>
                                        <td>

                                            <?php
                                                if($achatListe['ressut'] == 0)
                                                { 
                                            ?>
                                            <button type="button"  class="btn  btn-outline-warning btn-fw">
                                                <i class="mdi mdi-view"></i>
                                                En Attente
                                            </button>
                                            <?php 
                                                }
                                                else {
                                            ?>
                                            <a type="button" href="{{ route('listeAchat.validate', ['numAchat' => $achatListe['numAchat']]) }}" class="btn  btn-outline-success btn-fw"e
                                                <i class="mdi mdi-view"></i>
                                                Details
                                            </a>
                                            <?php 
                                                }
                                            ?>
                                        
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
