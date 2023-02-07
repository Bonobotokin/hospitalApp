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
    {{-- @dd($isRessut[0]) --}}
        
        <div id="formLivraison" class="row" style="display: ">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('achat_livraison') }}">
                            @csrf
                            <h4 class="m-6 text-center">
                                <big>BON DE LIVRAISON</big>                                
                            </h4>
                            
                            <div class="row ">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Numero de facture :</label>
                                        <input name="numFacture" type="number" class="form-control" placeholder="0012" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Numero de livraison :</label>
                                        <input type="number" class="form-control" name="numeroLivraison" placeholder="Numero de livraison">
                                    </div>
                                </div>
                            </div>

                            <p class="card-desription text-center">Information sur le fournisseur</p>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Raison Sociale:</label>
                                        <input type="text" name="fournisseur[raison]" class="form-control" placeholder="Raison Sociale"/>
                                    </div>
                                </div>   
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Activite:</label>
                                        <input type="text" name="fournisseur[activite]" class="form-control" placeholder="Activite">
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Adresse:</label>
                                        <input type="text" name="fournisseur[adresse]" class="form-control" placeholder="Adresse"/>
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">NIF:</label>
                                        <input type="number" name="fournisseur[nif]" class="form-control" placeholder="NIF"/>
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Numero du Compte:</label>
                                        <input type="number" name="fournisseur[numero]" class="form-control" placeholder="Raison Sociale"/>
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Telephone:</label>
                                        <input type="number" name="fournisseur[telephone]" class="form-control" placeholder="Telephone"/>
                                    </div>
                                </div>                          
                            </div>
                            
                            <p class="card-desription text-center">Information sur les Produit </p>
                        

                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <button type="reset" class="btn btn-inverse-danger btn-fw">
                                        <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                        Annuler
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-inverse-primary btn-fw">
                                        <i class="mdi mdi-plus btn-icon-prepend"></i>
                                        Ajouter
                                    </button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
@endsection
