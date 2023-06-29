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
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Liste des Ordonnance </h4>
                <!-- <a type="button" href="#" class="nav-link" style="color:white">
                        <blockquote class="blockquote blockquote-warning">
                            
                            <p >
                                Le Magasin depots a des nouveaux produits, veuillez me click 
                                pour en savoire quelle produits s'agit-il !
                            </p>
                        
                        </blockquote>
                    </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th class="text-center">Matricule</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Etat</th>
                        </thead>
                        <tbody>
                            @foreach ($liste as $data )
                            <tr data-consultation="{{ $data['consultation_id'] }}">
                                <!-- <tr> -->
                                <td class="text-center">{{ $data['matricule'] }}</td>
                                <td id="patient_nom" class="text-center">
                                    {{ $data['patient_nom'] }}
                                    <br>
                                    {{ $data['patient_prenom'] }}
                                </td>
                                <td class="text-right font-weight-medium">

                                    @if ($data['etat'] == false)
                                    <div class="badge badge-outline-info">non distribuer</div>
                                    <!-- <a href="{{ route('distribution.getOrdonnance', ['id' => $data['consultation_id']]) }}"class="badge badge-outline-info">non distribuer</a> -->
                                    @else

                                    <div class="badge badge-outline-success">distribuer</div>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="carte-ordonnance" class="col-lg-6 grid-margin stretch-card">
        <!-- ... Contenu de la deuxième carte ... -->

        <div class="card">
            <div class="card-body">

                @csrf
                <div class="card-title text-center">
                    <h4>Ordonnance</h4>
                </div>
                <table class="table">
                    <thead>
                        <th class="text-center">Designation</th>
                        <th class="text-center">Quantite</th>
                        <th class="text-center">Type</th>
                    </thead>

                    <tbody class="listeProduits">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form">
                </div>

            </div>
        </div>
    </div>
</div>

@endsection