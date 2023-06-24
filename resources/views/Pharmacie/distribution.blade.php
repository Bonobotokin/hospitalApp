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
                <!-- <a type="button" href="#" class="nav-link" style="color:white">
                        <blockquote class="blockquote blockquote-warning">
                            
                            <p >
                                Le Magasin depots a des nouveaux produits, veuillez me click 
                                pour en savoire quelle produits s'agit-il !
                            </p>
                        
                        </blockquote>
                    </a> -->
                <br><br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NumFacture</th>
                                <th>Matricule</th>
                                <th>Nom patient</th>
                                <th>Etat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($liste as $data )
                                <td>{{$data['id']}}</td>
                                <td>{{ $data['matricule'] }}</td>
                                <td id="patient_nom">{{ $data['patient'] }}</td>
                                <td>

                                @if ($data['etat'] == false)
                                    <div class="badge badge-outline-info">non distribuer</div>
                                @else
                                    
                                <div class="badge badge-outline-success">distribuer</div>
                                @endif

                                </td>
                                <td>
                                 <a  href="{{ route('distribution.prescription', ['consultation_id' => $data['id']]) }}"
                                        type="button"class="nav-link btn btn-success create-new-button">
                                        Distribuer
                                        <i class="mdi mdi-money float-right"></i>
                                    </a>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection