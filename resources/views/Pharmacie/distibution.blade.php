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
                <h4 class="card-title text-center"> DIstribution des Medicaments </h4>
                <div class="table-responsive">
                    <table id="tableDistribution" class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Matricule</th>
                                <th> Nom </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody id="listeDistribution">
                            @foreach ($liste as $data)
                            <tr id="" style="cursor:pointer">
                                <td id="id" style="display:none">{{ $data['id'] }}</td>
                                <td id="matricule"> {{$data['matricule']}} </td>
                                <td id="nomPatient"> {{$data['nom']}} </td>
                                <td>
                                    <a href="{{ route('details.patient.distribution', ['id' => $data['id']]) }}" type="button" class="btn btn-info btn-icon-text">
                                        Distribuer
                                        <i class="mdi mdi-loupe float-left"></i>
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