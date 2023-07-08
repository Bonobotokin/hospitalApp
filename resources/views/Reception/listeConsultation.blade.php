@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Liste des Consultation Ajourdhuit</h4>
                    <div class="template-demo mb-2">
                        <a type="button" href="{{ route('create.consultation') }}"
                            class="btn btn-outline-primary btn-fw">
							Nouveaux Consultation
						</a>
                    </div>
                    <div class="table-responsive">                       
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>									
                                    <th> Numero </th>
                                    <th> Nom & prenom </th>
                                    <th> Age </th>
                                    <th> Sexe </th>
                                    <th> A propos </th>
                                    <th> Medecin </th>
                                    <th> Action </th>
								</tr>
							</thead>
                            <tbody>
                                @foreach ( $listeConsultation as $liste)
                                
                                    @if ($liste['date_enregistrement'] === $dateConsultation)
                                        <tr>
                                            <td> {{$liste['matricule'] }} </td>
                                            <td> {{$liste['nom'] }} {{$liste['prenom'] }} </td>
                                            <td> {{$liste['age'] }}</td>                                            
                                            <td>
                                                @if($liste['sexe'] === 0)
                                                    Femme
                                                @else
                                                    Homme
                                                @endif
                                            </td>
                                            <td>
                                                @if ($liste['consultation'] == 1)
                                                    <label class="badge badge-danger">{{ $liste['type_consultation'] }}</label>
                                                @elseif ($liste['consultation'] == 2)
                                                    <label class="badge badge-info">{{ $liste['type_consultation'] }}</label>
                                                @endif
                                            </td>
                                            <td> {{$liste['nom_medecin']}} </td>
                                            <td class="template-demo">
                                                <a  type="button" class="badge badge-warning btn-block">
                                                    Modifier 
                                                    <i class="mdi mdi-refresh float-right"></i>
                                                </a>    
                                                <br><br>
                                                <a  type="button" class="badge badge-info btn-block">
                                                    Plus de details 
                                                    <i class="mdi mdi-show float-right"></i>
                                                </a>                                                  
                                            </td>
                                        </tr>  
                                    @endif                                  
                                @endforeach
                            </tbody>
						</table>
                    </div>
                </div>
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