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
    <div class="col-lg-6 col-md-6 grid-margin" id="cardConsultation">
        <div class="card">
            <div class="card-body">
                <h6 class="preview-subject text-center">Listes des Patient</h6>
                <div class="table-responsive">
                    <input type="text" class="form-control" placeholder="Search products">


                    <!--                     
                    <table id="tableMedicament" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom patient</th>
                                <th>IsHospitaled</th>
                            </tr>
                        </thead>
                        <tbody id="medicamentUl">
                        @foreach ($factures as $matricule => $group)
                            @foreach ($group as $facture)
                            <tr>
                                <td>Matricule: {{ $matricule }}</td>
                                <td>{{ $facture['nom_patient'] }}</td>
                                <td>{{ $facture['designation_produits'] }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                     -->
                    @foreach ($factures as $key => $group)
                    <table id="tableMedicament" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom patient</th>
                                <th>IsHospitaled</th>
                            </tr>
                        </thead>
                        <tbody id="medicamentUl">
                            @foreach ($group as $facture)
                            <tr>
                                <td>{{ $facture['matricule'] }}</td>
                                <td>{{ $facture['nom_patient'] }}</td>
                                <td>{{ $facture['IsHospitaled'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Facture</h3>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Consultation</span>
                        </div>
                        <input type="text" class="form-control" placeholder="00000" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <p class="text-center">Medicaments</p>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Paracetamole 250</span>
                            <span class="input-group-text">Qt : 50</span>
                        </div>
                        <input type="text" class="form-control" placeholder="00000" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="submit" class="btn btn-dark mr-2">Annuler</button>
            </div>
        </div>
    </div>
</div>

@endsection