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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">Nouveaux Patient</h4>
            <form class="form-sample" action="{{ route('store.consultation') }}" method="POST">
                @csrf
                <p class="card-description"> Information Sur le patient(e) </p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Matricule">Matricule :</label>
                            <input required type="text" name="patient[matricule]" class="form-control" placeholder="Numero Matricule">
                            @error('patient[matricule]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Nom">Nom :</label>
                            <input required type="text" style="text-transform: uppercase;" name="patient[nom_patient]" class="form-control" placeholder="Nom du patient">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Prenom">Prenom :</label>
                            <input required type="text" name="patient[prenom_patient]" class="form-control" placeholder="Nom du patient">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="Sexe">Sexe :</label>
                            <select name="patient[sexe_patient]" class="form-control">
                                <option value="0">Femme</option>
                                <option value="1">Homme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="Age">Age :</label>
                            <input required type="text" name="patient[age_patient]" class="form-control" placeholder="20 Ans">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Profession">Profession :</label>
                            <input required type="text" name="patient[profession_patient]" class="form-control" placeholder="Profession">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Adresse">Adresse :</label>
                            <input required type="text" name="patient[adresse_patient]" class="form-control" placeholder="Adresse de la patient">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="situation_matrimoniale">Situation Matrimoniale :</label>
                            <select name="patient[situation_matrimoniale_patient]" class="form-control">
                                <option value="Celibataire">Celibataire</option>
                                <option value="Marier">Marier</option>
                                <option value="Divorcer">Divorcer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Contact">Telephone 1:</label>
                            <input type="text" name="patient[telephone_1_patient]" class="form-control" placeholder="+241346697188">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Contact">Telephone 2:</label>
                            <input type="text" name="patient[telephone_2_patient]" class="form-control" placeholder="+261346697188">
                        </div>
                    </div>
                </div>
                <p class="card-description"> Information sur les Parents du patient </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pere_patient">Nom du pere:</label>
                            <input type="text" name="patient[nomPere_patient]" class="form-control" placeholder="Nom du pere de la patient">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mere_patient">Nom de la Mere:</label>
                            <input type="text" name="patient[nomMere_patient]" class="form-control" placeholder="Nom de la Mere de la pateitn">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="personne_reference">Nom du pere de reference:</label>
                            <input type="text" name="patient[nomPere_reference_patient]" class="form-control" placeholder="Persoone de reference">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone_personne_reference">Telephone du personne a reference:</label>
                            <input type="text" name="patient[telephone_reference_patient]" class="form-control" placeholder="Telephone de la reference">
                        </div>
                    </div>
                </div>
                <p class="card-description"> Parametre du patient </p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Poids">Poids :</label>
                            <input required type="text" name="parametres[poids]" class="form-control" placeholder="Poids">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Taills">Taills :</label>
                            <input required type="text" name="parametres[taille]" class="form-control" placeholder="Taills">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Temperature">Temperature :</label>
                            <input required type="text" name="parametres[temperature]" class="form-control" placeholder="Temperature">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tension Arteriel">Tension Arteriel :</label>
                            <input required type="text" name="parametres[tension]" class="form-control" placeholder="Tension Arteriel">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Pouls">Pouls :</label>
                            <input required type="text" name="parametres[pouls]" class="form-control" placeholder="Pouls">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Frequence">Frequence :</label>
                            <input required type="text" name="parametres[frequence]" class="form-control" placeholder="Frequence">
                        </div>
                    </div>
                </div>
                <p class="card-description"> Type de consultation </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="typeConsultation">Type Consultation</label>
                            <select name="consultantion[type_consultation]" class="form-control">

                                @foreach ($types as $consultantion)
                                <option value="{{ $consultantion->id }}">{{ $consultantion->type_consultaion }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Medecins">Medecins qui Refere :</label>

                            <select name="medecin_conultation" class="form-control">
                                <option value=" ">----</option>
                                @foreach ($medecins as $medcinReferer)
                                <option value="{{$medcinReferer['id']}}">{{$medcinReferer['nom']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-danger btn-lg btn-block">
                            <i class="mdi mdi-account-multiple-minus "></i>
                            Annuler
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            <i class="mdi mdi-account-check "></i>
                            Enregistrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{ asset('script/examens_echographie.js') }}"></script>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<!-- End plugin js for this page -->
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/js/dashboard.js') }}"></script>

<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script src="{{ asset('script/symptomes.js') }}"></script>
<script src="{{ asset('script/diagnostic.js') }}"></script>
<script src="{{ asset('script/diagnostic.js') }}"></script>
<script src="{{ asset('assets/js/select2.js ') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('script/getElemtCommande.js') }}"></script>
<script src="{{ asset('script/scriptLivraisonCommande.js') }}"></script>
<script src="{{ asset('script/manupilation.js')}}"></script>
<!-- <script src="{{ asset('script/achatScript.js') }}"></script> -->
{{-- js for manipulation --}}
<script src="{{ asset('script/consultation.js') }}"></script>
<script src="{{ asset('script/examens_echographie.js')}}"></script>
<script src="{{ asset('script/examens_laboratoire.js')}}"></script>
<script src="{{ asset('script/symptomes.js') }}"></script>
<script src="{{ asset('script/diagnostic.js') }}"></script>
<script src="{{ asset('script/prescription.js')}}"></script>
<script src="{{ asset('script/payedFacture.js')}}"></script>
@endsection
