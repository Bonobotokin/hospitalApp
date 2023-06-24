// window.onload = () => {
//     // const prescription = document.querySelector('#prescription');
//     // const contentExamens = document.querySelector("#examens");
//     // const contentParametre = document.querySelector("#parametre");
//     // const contentResultat = document.querySelector("#resultatExamens");
//     // const contentDiagnostic = document.querySelector("#diagnostic");
//     // if (prescription.innerText == null) {
//         const listePatient = document.getElementById('listePatient');
//         const ligne = listePatient.getElementsByTagName('tr');
//         const content_remove = document.getElementById('listePatient');
//         content_remove.remove(content_remove);

//         const tbody = document.createElement('tbody');
//         tbody.id = "listePatient";
//         document.getElementById("tableFactureListe").appendChild(tbody);
//         for (let i = 0; i < ligne.length; i++) {
//             const tr = document.createElement('tr');
//             tr.style.cursor = 'pointer';
//             tr.id = 'content_search' + i;
//             tr.className = "content_search";
//             tr.innerHTML = ligne[i].innerHTML;
//             console.log(ligne[i].innerHTML);
//             document.getElementById("listePatient").appendChild(tr);
//         }

//         for (let j = 0; j < ligne.length; j++) {
//             const clickContent = document.getElementById('content_search' + j);

//             clickContent.addEventListener('click', function () {

//                 const content_click = document.querySelector('#content_search' + j);
//                 const contentFacture = content_click.getElementsByTagName('td');
                
//                 var titre_facture = document.getElementById("titre_facture");
//                 var consultationPrix = document.getElementById("consultation_prix");
//                 // const cardFacturePayed = document.getElementById("facture_");
//                 // var patientnom = document.getElementById("")

//                 for (let ul = 0; ul < contentFacture.length; ul++) {
//                     var libelleFacture = contentFacture[4].innerText;
//                     var consultation_prix = contentFacture[9].innerText;
                    
//                     titre_facture = "Facture de " + libelleFacture;
                    
//                 }
            
//             }, false);
//         }
// }


function updateFacture() {
    const prdouitDesable = document.getElementById("prdouitDesable");
    
    const div = document.createElement('div');
    div.className = "text-center ";
    div.style = "margin: 5%;"
    div.innerHTML = 
    `
        <button type="reset" class="btn btn-danger" > Annuler la modification</button>
        <button type="submit" class="btn btn-info">Enregistrer la modification</button>
    `;
    prdouitDesable.removeAttribute('disabled');
    document.getElementById("ListeBtnupdate").appendChild(div);
    ListeBtn.style.display = "none";

}