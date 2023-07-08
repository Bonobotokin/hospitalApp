@extends('layouts.script')
@section('scriptExamen')
<script>
    (function($) {
    'use strict';
    $(function() {
        $('#listeExament').on('click', 'tr', function() {
            var examenId = parseInt($(this).data('examen'));

            // console.log(examenId);
            updateCarteExamen(examenId);
        });
    });
})(jQuery);

function addInListeAnalyse() {
    var listeAnalyse = document.getElementById("listeAnalyse");
    var selectedIndex = listeAnalyse.selectedIndex;
    var selectedOption = listeAnalyse.options[selectedIndex];
    var tr = document.createElement("tr");
    if (selectedOption) {
        var selectedValue = selectedOption.value;
        var selectedText = selectedOption.innerText;

        getExamenAnalysesLaboratoire(selectedValue);
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
@endsection