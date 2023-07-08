@extends('layouts.app')
@section('content')
@if ($message = Session::get('error'))
<div class="alertDanger">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Error!</strong>
    {{ $message }}
</div>
@endif
<div class="row">
    <div id="listeExamen" class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Liste des Examen</h4>
                <div class="table-responsive">
                    <table id="listeExament" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> Matricule </th>
                                <th> Nom & prenom </th>
                                <th> Age </th>
                                <th> Medecin </th>
                                <th> Examen </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examen as $liste)
                            @if ($liste[0]['examen']->finished == 1)
                                
                            <tr data-examen="{{ $liste['id'] }}" id="liste" style="cursor:pointer">
                                <td>{{ $liste['matricule'] }}</td>
                                <td>{{ $liste['nom'] }} {{ $liste['prenom'] }}</td>
                                <td>{{ $liste['age'] }} Ans</td>
                                <td>{{ $liste['medecin'] }}</td>
                                <td>

                                    @foreach ($liste['examen'] as $examen)
                                    <label class="badge badge-info">{{ $examen['designation_examens_labo'] }}</label>
                                    @endforeach
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
    <div id="formulaire-examen" class="col-lg-12 grid-margin stretch-card" style="display: none ;">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class=" text-center titleResultat">Resultat </h4>
                </div>

                <h6 class="preview-subject">Ajouter une autre analyses</h6>
                <div class="template-demo">
                    <div class="table-responsive">
                        <div class="add-items d-flex">
                            <label for=""></label>
                            <select id="listeAnalyse" class="js-example-basic-single " style="width:100%;">
                                <!-- <option id="listeFormOption" value=""></option> -->
                                @foreach ($listeExamen as $listes)
                                <option value="{{ $listes['id']}}">{{ $listes['designation_examens_labo']}}</option>
                                @endforeach

                            </select>
                            <button onclick="addInListeAnalyse();" class="add btn btn-primary labo-list-add-btn">Ajouter</button>
                        </div>
                    </div>
                </div>
                <form action="{{ route('save.resultat.laboratoire') }}" method="POST">
                    @csrf
                    <div class="form">

                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> Parametres </th>
                                    <th style="width:10%"> Valeurs de references </th>
                                    <th> Unite </th>
                                    <th style="width:20%"> Valeur </th>
                                    <th> Observation </th>
                                </tr>
                            </thead>
                            <tbody id="ListeExame">
                            </tbody>
                        </table>

                    </div>

                    <textarea required id="summernote" name="conclusion" cols="30" rows="10" placeholder="Rapportd ou conclusion d'analyses"> </textarea>
                    <div class="row" style="margin: 2% 0 0 0;">
                        <div class="col-md-6 text-right">
                            <button type="reset" class="btn btn-inverse-danger btn-fw">
                                <i class="mdi mdi-refresh btn-icon-prepend"></i>
                                Annuler
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-inverse-primary btn-fw">
                                <i class="mdi mdi-plus btn-icon-prepend"></i>
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
<script>
    (function($) {
        'use strict';
        $(function() {
            $('#listeExament').on('click', 'tr', function() {


                // var baseUrl = window.location.href.split('/')[3]
                // var urlAfterBase = window.location.href.split('/')[4]
                // var endUrl = window.location.href.split('/')[5]

                // console.log(baseUrl + "/" + urlAfterBase);
                // var combine = baseUrl + "/" + urlAfterBase;

                // if (combine == 'Laboratoire/liste') {
                var examenId = parseInt($(this).data('examen'));
                updateCarteExamen(examenId);
                // }


                // console.log(examenId);
            });
        });
    })(jQuery);

    function addInListeAnalyse() {
        var listeAnalyse = document.getElementById("listeAnalyse");
        var selectedIndex = listeAnalyse.selectedIndex;
        var selectedOption = listeAnalyse.options[selectedIndex];
        var tr = document.createElement("tr");
        var listeExame = document.getElementById('ListeExame');
        var examenListeExamenData = listeExame.querySelectorAll('tr');
        console.log(examenListeExamenData.length);
        if (selectedOption) {


            // var baseUrl = window.location.href.split('/')[3]
            // var urlAfterBase = window.location.href.split('/')[4]
            // var endUrl = window.location.href.split('/')[5]

            var selectedValue = selectedOption.value;
            var selectedText = selectedOption.innerText;
            var countListe = examenListeExamenData.length;

            // if (combine == 'Laboratoire/liste') {

            getExamenAnalysesLaboratoire(selectedValue, countListe);
            // }
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
                    examenItem += '<td>' + liste[i].designation_examens_labo + '<input type="hidden" name="' + elementCount + '[id]" value="' + liste[i].id + '"></td>';
                    examenItem += '<td>' + liste[i].valeurs_referrences + '</td>';
                    examenItem += '<td>' + liste[i].Unite + '</td>';
                    examenItem += '<td><input required type="text" class="form-control" name="' + elementCount + '[resultats]" value=""></td>';
                    examenItem += `<td>
                        <select class="js-example-basic-single form-control" name="${elementCount}[observation]"style="width:100%;">
                        <option value="Haut">Haut</option>
                        <option value="Normale">Normale</option>
                        <option value="Bas">Bas</option>
                        </select>
                    </td>`;
                    examenItem += '</tr>'
                    elementCount++;
                }
                var nombre = `<input id="nombreListe" type="hidden" name="nombre" value="${elementCount}"/>`;
                var patient = `<input type="hidden" name="patient_nom" value="${patient_nom}"/>`;
                $('#formulaire-examen').find('.titleResultat').text('Resultat d\'examen de ' + patient_nom);
                listeExame.append(examenItem + nombre + patient);
            },
            error: function(xhr, status, error) {
                alert(console.error(xhr.responseText));
            }
        });

    }

    function getExamenAnalysesLaboratoire(selectedValue, countListe) {
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
                var elementCount = countListe;
                examenItem += '<tr>';
                examenItem += '<td>' + examens.designation_examens_labo + '<input type="hidden" name="' + elementCount + '[id]" value="' + examens.id + '"/></td>';
                examenItem += '<td>' + examens.valeurs_referrences + '</td>';
                examenItem += '<td>' + examens.Unite + '</td>';
                examenItem += '<td><input required type="text" class="form-control"  name="' + elementCount + '[resultats]" placeholder="valeur" value=""/></td>';
                examenItem += `<td>
                        <select class="js-example-basic-single form-control name="${elementCount}[observation]" form-control" style="width:100%;">
                        <option value="Haut">Haut</option>
                        <option value="Normale">Normale</option>
                        <option value="Bas">Bas</option>
                        </select>
                    </td>`;
                examenItem += '</tr>';

                var nombreListe = document.getElementById("nombreListe");
                nombreListe.remove(nombreListe)
                var nombre = `<input type="hidden" name="nombre" value="${elementCount}"/>`

                nombreListe.append(elementCount);
                listeExame.append(examenItem + nombre);
            },

            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    }
</script>
@endsection