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
                <h4 class="card-title text-center">Liste des Commandes</h4>

                <!-- <div class="alertDanger">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Danger!</strong>
                    Vous {{ count($pharmacieCommande) }} Commande des Medicament in Pharmacie
                    <br>
                    <button>pour plus de details click ici</button>
                </div> -->
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
                            @foreach ($pharmacieCommande as $liste)
                            <tr>
                                <td>

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