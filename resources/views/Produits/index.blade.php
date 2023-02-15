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
                    <h4 class="card-title text-center">Liste des Produits</h4>
                    <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                        data-target="#newFourniture">
                        Nouveaux Produits
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Nom </th>
                                    <th> Abreviation </th>
                                    <th> Fabriquant </th>
                                    <th> Type </th>
                                    <th> Prix vente U </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $produitListe as $data )
                                    <tr>
                                        <td> {{ $data['nom'] }} </td>
                                        <td> {{ $data['abrev'] }} </td>
                                        <td> {{ $data['fabriquant'] }} </td>
                                        <td> {{ $data['types'] }} </td>
                                        <td> {{ $data['prix_vente'] }} Ar </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-icon-text" data-toggle="modal"
                                            data-target="#update_{{ $data['num'] }}">
                                                Modifier
                                                <i class="mdi mdi-refresh float-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade"   id="update_{{ $data['num'] }}">
                                        <div class="modal-dialog" style="max-width: 50rem">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ">Mise a jour de {{ $data['nom'] }}</h4>
                                                    <button style="color:#e32c2c" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample" action="{{route('store.produits')}}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cateogorie">Categorie : </label>
                                                                    <select name="categori" class="form-control" id="">
                                                                        <option value="Fourniture">Fourniture</option>
                                                                        <option value="Medicaments">Medicament</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cateogorie">Designation : </label>
                                                                    <input type="text" name="designation" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cateogorie">Type : </label>
                                                                    <input type="text" name="type" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cateogorie">Fabriquant : </label>
                                                                    <input type="text" name="fabriquant" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cateogorie">Prix d'achat : </label>
                                                                    <input type="text" name="prix_achat" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cateogorie">Prix de vente : </label>
                                                                    <input type="text" name="prix_vente" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
