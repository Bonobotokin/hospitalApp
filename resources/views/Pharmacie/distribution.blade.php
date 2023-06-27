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
                        <tbody>
                            @foreach ($liste as $data )
                            <tr data-consultation="{{ $data['consultation_id'] }}">

                                <td>{{ $data['consultation_id'] }}</td>
                                <td>{{ $data['matricule'] }}</td>
                                <td id="patient_nom">{{ $data['patient'] }}</td>
                                <td class="text-right font-weight-medium">

                                    @if ($data['etat'] == false)
                                    <div class="badge badge-outline-info">non distribuer</div>
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
                <h4 class="card-title text-center">Ordonnance de </h4>
                <!-- <a type="button" href="#" class="nav-link" style="color:white">
                        <blockquote class="blockquote blockquote-warning">
                            
                            <p >
                                Le Magasin depots a des nouveaux produits, veuillez me click 
                                pour en savoire quelle produits s'agit-il !
                            </p>
                        
                        </blockquote>
                    </a> -->
            </div>
        </div>
    </div>
</div>

@endsection