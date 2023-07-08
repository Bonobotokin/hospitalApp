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
        $("#listeExament").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
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

<!-- 
<script>
    $(document).ready(function() {
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
        $('table').on('click', 'tr', function() {
            var factureId = parseInt($(this).data('facture'));

            // console.log(factureId);
            updateCarteFacture(factureId);
        });
    });

    function updateCarteFacture(factureId) {
        $.ajax({
            url: '{{ route("caisse.getFacture", ["id" => "__factureId__"]) }}'.replace('__factureId__', factureId),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(JSON.stringify(data));
                // Parcourir les clés de l'objet consultationId
                var id = data.factureId['dataDetails']['id'];
                var patient_nom = data.factureId['dataDetails']['patient'];
                console.log(patient_nom);

                $('#carte-facture').find('#titre_facture').text('Payment de la facture de ' + patient_nom);
                var produits = data.factureId['dataDetails']['produits'];
                var url = '{{ route("enregistrement.Facture")}}';
                // Mettre à jour le contenu de la carte avec les données de l'ordonnance

                var produitsHtml = '';
                produits.forEach(function(item) {
                    produitsHtml += '<tr>';
                    produitsHtml += '<td>' + item.produit_nom + '</td>';
                    produitsHtml += '<td><input type="hidden" name="produit[produit_nom]" value="' + item.produit_nom + '"><td>';
                    produitsHtml += '<td id="prix_totale" class="text-center">' + item.prix_totale + '</td>'
                    produitsHtml += '</tr>';
                });

                var idProduits = '';
                elementCount = 0;
                for (let i = 0; i < produits.length; i++) {
                    idProduits += '<input type="hidden" name="' + elementCount + '[produits_id]" value="' + produits[i].id + '">';
                    idProduits += '<input type="hidden" name="' + elementCount + '[produits_quantite]" value="' + produits[i].quantite + '">';
                    elementCount++;
                }

                var prixConsultation = data.factureId['dataDetails']['consultation_prix'];
                var laboratoire_prix = data.factureId['dataDetails']['laboratoire_prix'];
                var prixTotal = data.factureId['dataDetails']['prixTotal'];

                if (data.factureId['dataDetails']['reste'] != 0) {

                    var conditionResteHtml = `   <input type="hidden" name="totalMontantDefault" id="totalMontantDefault" value="${data.factureId['dataDetails']['reste'] }">`
                } else {
                    var calculeMontant = data.factureId['dataDetails']['prixTotal'] - data.factureId['dataDetails']['montant'];
                    var conditionResteHtml = `  <input type="hidden" name="totalMontantDefault" id="totalMontantDefault" value="${calculeMontant}">`
                }

                var formHtml = ` <div class="table-responsive">
                    <form action="${url}" method="post">
                        @csrf

                        <table id="tableFactureListe" class="table table-bordered table-striped tableFactureListe">
                            <thead>
                                <tr>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Montant</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">Consultation</td>
                                    <td id="consultation_prix" class="text-center">${prixConsultation}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Soin</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Laboratoire</td>
                                    <td class="text-center">${laboratoire_prix}</td>
                                </tr>

                                <tr>
                                    ${produitsHtml}
                                </tr>
                            </tbody>
                            <tfoot>

                                <tr style="background: #cb930a; color: white;font-weight: 800;">

                                    <td class="text-center">Montant a payer</td>


                                    <td id="prixTotal" class="text-center">
                                        ${prixTotal} Ar
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        
                        <div class="preview-item border-bottom" style="margin:5% 0 5% 0">
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" style="max-width: 100%;">Montant paye</span>
                                    </div>
                                    <input onkeyup="getMontantReste();" type="number" class="form-control" name="montantPayed" id="montantPayed" value="{{ 0 + old('montantPayed') }}" required autocomplete="montantPayed" autofocusaria-label="Repayed">
                                    @error('montantPayed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">Ar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="preview-item border-bottom">
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" style="max-width: 100%;">Reste a payer</span>
                                    </div>
                                    <input type="number" class="form-control" value="${data.factureId['dataDetails']['reste']}" name="restePayed" id="restePayed" aria-label="Repayed">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Ar</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="numFacture" value="${data.factureId['dataDetails']['facture']}">
                        <input type="hidden" name="description" value="Payement de la facture de ${data.factureId['dataDetails']['matricule']}">
                        ${conditionResteHtml}

                        <div class="form-group text-center" style="margin: 5%;">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                    </div>`;

                // $('#carte-ordonnance').find('.listeProduits').html(produitsHtml);
                $('#carte-facture').find('.form').html(formHtml);

            },
            error: function(xhr, status, error) {

                alert(console.error(xhr.responseText));
            }
        });

    }
</script> -->
<!-- @stack('scriptExamen') -->

<script>
    (function($) {
        'use strict';
        $(function() {
            $('#listeExament').on('click', 'tr', function() {


                var baseUrl = window.location.href.split('/')[3]
                var urlAfterBase = window.location.href.split('/')[4]
                var endUrl = window.location.href.split('/')[5]

                console.log(baseUrl + "/" + urlAfterBase);
                var combine = baseUrl + "/" + urlAfterBase;

                if (combine == 'Laboratoire/examen') {
                    var examenId = parseInt($(this).data('examen'));
                    updateCarteExamen(examenId);
                }


                // console.log(examenId);
            });
        });
    })(jQuery);

    function addInListeAnalyse() {
        var listeAnalyse = document.getElementById("listeAnalyse");
        var selectedIndex = listeAnalyse.selectedIndex;
        var selectedOption = listeAnalyse.options[selectedIndex];
        var tr = document.createElement("tr");
        if (selectedOption) {


            var baseUrl = window.location.href.split('/')[3]
            var urlAfterBase = window.location.href.split('/')[4]
            var endUrl = window.location.href.split('/')[5]

            var selectedValue = selectedOption.value;
            var selectedText = selectedOption.innerText;

            if (combine == 'Laboratoire/examen') {
                    
            getExamenAnalysesLaboratoire(selectedValue);
                }
        } else {
            alert("Aucune option sélectionnée.");
        }
    }

    function updateCarteExamen(examenId) {
        $.ajax({
            url: '{{ route("consultation.getElementLabo", ["id" => "__examenId__"]) }}'.replace('__examenId__', examenId),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(JSON.stringify(data)); // Vérifiez la structure des données renvoyées
                document.getElementById("listeExamen").style.display = "none";
                document.getElementById("formulaire-examen").style.display = "block"
                var examens = data.examenId[0]; // Supposons que le résultat est un tableau avec un seul élément
                var patient_nom = examens.nom + " " + examens.prenom;
                var liste = examens.examen
                // var examenItem = '';

                // liste.forEach(function (item) {
                //     examenItem += '<tr>';
                //     examenItem += '<td>' + item.designation_examens_labo + '<input type="hidden" name="analyse[id]" value="' + item.id + '"/></td>';
                //     examenItem += '<td>' + item.valeurs_referrences +'</td>';
                //     examenItem += '<td>' + item.Unite +'</td>';
                //     examenItem += '<td><input type="text" class="form-control" naem="analyse[valeurs]" placeholder="valeur" value=""/></td>';
                //     examenItem += '</tr>';

                // });
                var listeExame = $('#ListeExame');
                var examenItem = '';
                elementCount = 0;
                for (let i = 0; i < liste.length; i++) {
                    examenItem += '<tr>'
                    examenItem += '<td>' + liste[i].designation_examens_labo + '<input type="hidden" name="' + elementCount + '[produits_id]" value="' + liste[i].id + '"></td>';
                    examenItem += '<td>' + liste[i].valeurs_referrences + '</td>';
                    examenItem += '<td>' + liste[i].Unite + '</td>';
                    examenItem += '<td><input type="text" name="' + elementCount + '[produits_id]" value="' + liste[i].id + '"></td>';
                    examenItem += '</tr>'
                    elementCount++;
                }
                // var form = 
                $('#formulaire-examen').find('.titleResultat').text('Resultat d\'examen de ' + patient_nom);
                listeExame.append(examenItem);
            },
            error: function(xhr, status, error) {
                alert(console.error(xhr.responseText));
            }
        });

    }

    function getExamenAnalysesLaboratoire(selectedValue) {
        $.ajax({
            url: '{{ route("consultation.getDataElement", ["id" => "__selectedValue__"]) }}'.replace('__selectedValue__', selectedValue),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(JSON.stringify(data)); // Vérifiez la structure des données renvoyées
                var examens = data.examenId[0]; // Supposons que le résultat est un tableau avec un seul élément
                console.log(examens.id);

                var examenItem = '';
                var listeExame = $('#ListeExame');
                examenItem += '<tr>';
                examenItem += '<td>' + examens.designation_examens_labo + '<input type="hidden" value="' + examens.id + '"/></td>';
                examenItem += '<td>' + examens.valeurs_referrences + '<input type="hidden" value="' + examens.valeurs_referrences + '"/></td>';
                examenItem += '<td>' + examens.Unite + '<input type="hidden" value="' + examens.Unite + '"/></td>';
                examenItem += '<td><input type="text" class="form-control" placeholder="valeur" value=""/></td>';
                examenItem += '</tr>';

                listeExame.append(examenItem);
            },

            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    }
</script>