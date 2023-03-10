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
                    <h4 class="card-title text-center">Liste des Livraison</h4>
                    <a href="{{ route('createNewLivraison') }}" type="button" class="btn btn-outline-primary btn-fw">
                        Nouveaux Livraison
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
                                @foreach ($livraison as $livraisonListe)
                                    <tr>
                                        <td> 0 {{ $livraisonListe['num_livraison'] }}</td>
                                        <td>{{ $livraisonListe['date'] }}</td>
                                        <td>
                                            <?php
                                                if($livraisonListe['isValidate'] == 0)
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
                                            <a type="button"
                                                href="{{ route('livraison.show', ['num_livraison' => $livraisonListe['num_livraison']]) }}"
                                                class="btn  btn-outline-success btn-fw"e <i class="mdi mdi-view"></i>
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
