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
    
        
        <div id="formLivraison" class="row" >
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
                                        @if ($livraisonNum->isNotempty())
                                            <?php
                                                $numero = $livraisonNum[0]['num_livraison'] + 1 ;
                                            ?>
                                            <input type="number" class="form-control" name="numeroLivraison" value="{{ $numero }}">
                                        @elseif ($livraisonNum->isEmpty())
                                            <input type="number" class="form-control" name="numeroLivraison" value="1">
                                        @endif  
                                
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
                        
                            
                            <input type="hidden"  name="listeAchatLivred" value="{{ count($achat) }}">

                            @for ($i = 0; $i < count($achat); $i++)

                                <input type="hidden" name="{{ $i }}[achat_id]" value="{{ $achat[0]['achat_id'] }}">
                                <input type="hidden" name="{{ $i }}[numAchat]" value="{{ $achat[0]['numAchat'] }}">

                                <div class="row m-20">
                                    <input type="hidden" name="{{ $i }}[produits_id]"
                                    value="{{ $achat[$i]['produits_id'] }}">

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Designation :</label>
                                            <input type="text" class="form-control"
                                                value="{{ $achat[$i]['abrev'] }} - {{ $achat[$i]['types'] }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Condit:</label>
                                            <input name="{{ $i }}[conditionnement]" type="text"
                                                class="form-control" value="{{ $achat[$i]['conditionnnement_achat'] }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Qt Achat:</label>
                                            <input  type="number" value="{{ $achat[$i]['quantite_achat'] }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Qt Livr:</label>
                                            <input name="{{ $i }}[quantite]" type="number"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Qt Total:</label>
                                            <input name="{{ $i }}[total]" type="number"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Prix:</label>
                                            <input name="{{ $i }}[prix_achat]" type="number"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            @endfor


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
