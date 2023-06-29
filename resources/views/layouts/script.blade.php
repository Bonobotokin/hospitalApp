
    
<div class="modal fade" id="newFourniture">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">Nouveaux Fourniture</h4>
                <button style="color:#e32c2c" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('store.produits') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cateogorie">Categorie : </label>
                                <select name="categori" class="form-control" id="">
                                    <option value="Materiels">Materiels</option>
                                    <option value="Fourniture">Fourniture</option>
                                    <option value="Medicaments">Medicament</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="designation">Designation : </label>
                                <input type="text" name="designation" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cateogorie">Abreviation : </label>
                                <input type="text" name="abrev" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Type">Type : </label>
                                <input type="text" name="type" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fabriquant">Fabriquant : </label>
                                <input type="text" name="fabriquant" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cateogorie">Prix de vente Unitaire : </label>
                                <input type="number" name="prix_vente" class="form-control">
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
<script src="{{ asset('script/achatScript.js') }}"></script>
{{-- js for manipulation --}}
<script src="{{ asset('script/consultation.js') }}"></script>
<script src="{{ asset('script/examens_echographie.js')}}"></script>
<script src="{{ asset('script/examens_laboratoire.js')}}"></script>
<script src="{{ asset('script/symptomes.js') }}"></script>
<script src="{{ asset('script/diagnostic.js') }}"></script>
<script src="{{ asset('script/prescription.js')}}"></script>
<script src="{{ asset('script/payedFacture.js')}}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example3').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function getMontantReste() {
        var montantPayed = parseFloat(document.getElementById("montantPayed").value);
        var restePayed = document.getElementById("restePayed");
        var totalMontantDefault = parseFloat(document.getElementById("totalMontantDefault").innerText);

        if (totalMontantDefault > montantPayed) {
            restePayed.value = totalMontantDefault - montantPayed.toFixed(2);

        } else if (totalMontantDefault <= montantPayed) {
            restePayed.value = '0.00';
            montantPayed = "Desoler, le montant est trop elever que la facture a payer, veuillez insert une valeur exacte"
        }


    }
</script>
<!-- <script>
    $(document).ready(function() {
        // ...

        // Ajoutez ce code pour détecter l'événement de clic sur les lignes de la table
        $('table').on('click', 'tr', function() {
            var matricule = $(this).data('matricule');
            updateCarteOrdonnance(matricule);
        });
    });

    // Ajoutez cette fonction pour mettre à jour le contenu de la deuxième carte avec le matricule sélectionné
    function updateCarteOrdonnance(matricule) {
        var carteOrdonnance = $('#carte-ordonnance');
        carteOrdonnance.find('.card-title').text('Ordonnance de ' + matricule);
    }
</script> -->
<!-- <script>
    $(document).ready(function() {
        $('table').on('click', 'tr', function() {
            var consultationId = parseInt($(this).data('consultation'));
            updateCarteOrdonnance(consultationId);
        });
    });

    function updateCarteOrdonnance(consultationId) {
        $.ajax({
            url: '{{ route("distribution.getOrdonnance", ["id" => "__consultationId__"]) }}'.replace('__consultationId__', consultationId),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(JSON.stringify(data.consultationId['dataDetails']['patient_nom']));
                // Parcourir les clés de l'objet consultationId
                var id = data.consultationId['dataDetails']['id'];
                var patient_nom = data.consultationId['dataDetails']['patient_nom'];
                var produits = data.consultationId['dataDetails']['produits'];
                var url = '{{ route("distribution.update")}}';
                // Mettre à jour le contenu de la carte avec les données de l'ordonnance

                var produitsHtml = '';
                produits.forEach(function(item) {
                    produitsHtml += '<tr>';
                    produitsHtml += '<td>' + item.produit_nom + '</td>';
                    produitsHtml += '<td class="text-center">' + item.quantite + '</td>';
                    produitsHtml += '<td>' + item.categorie + '</td>';
                    produitsHtml += '</tr>';
                });

                var idProduits = '';
                elementCount = 0;
                for (let i = 0; i < produits.length; i++) {
                    idProduits += '<input type="hidden" name="'+elementCount+'[produits_id]" value="'+ produits[i].id +'">';
                    idProduits += '<input type="hidden" name="'+elementCount+'[produits_quantite]" value="'+ produits[i].quantite +'">';
                    elementCount++;
                }

                var formHtml = `<form class="form-sample" action="${url}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="${id}">
                                    `+ idProduits +`
                                    <input type="hidden" name="nombreProduits" value="${elementCount}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="reset" class="btn btn-danger btn-lg btn-block">
                                                <i class="mdi mdi-account-multiple-minus"></i>
                                                Annuler
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                                <i class="mdi mdi-account-check"></i>
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                </form>`;


                $('#carte-ordonnance').find('.card-title').text('Ordonnance de ' + patient_nom);
                $('#carte-ordonnance').find('.listeProduits').html(produitsHtml);
                $('#carte-ordonnance').find('.form').html(formHtml);

            },
            error: function(xhr, status, error) {

                alert(console.error(xhr.responseText));
            }
        });

    }
</script> -->

