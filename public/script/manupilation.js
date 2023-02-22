// Manipulation consultation 
window.onload = () => {

    const medicamentUl = document.getElementById('medicamentUl');
    let ligne = medicamentUl.getElementsByTagName('tr');
    let content_remove = document.getElementById('medicamentUl');
    content_remove.remove(content_remove);
    var tbody = document.createElement('tbody')
    tbody.id = "medicamentUl";

    document.getElementById("tableMedicament").appendChild(tbody)
    for (let i = 0; i < ligne.length; i++) {

        let tr = document.createElement('tr')
        tr.style.cursor = 'pointer';
        tr.id = 'content_search_medicament' + i;
        tr.className = "content_search_medicament";
        // tr.setAttribute('onclick', 'addPrecription()')
        tr.innerHTML = ligne[i].innerHTML;
        console.log(ligne[i].innerHTML);
        document.getElementById("medicamentUl").appendChild(tr);
    }

    let prescription = document.getElementById('prescription');
    let contentExamens = document.getElementById("examens");
    let contentParametre = document.getElementById("parametre");
    let contentResultat = document.getElementById("resultatExamens");
    let contentDiagnostic = document.getElementById("diagnostic");


    for (let j = 0; j < ligne.length; j++) {
        let clickContent = document.getElementById('content_search_medicament' + j);

        clickContent.addEventListener('click', function () {
            // ajouter les Medicament dans le formulaire
            let content_click;
            contentDiagnostic.style.display = "none";
            contentResultat.style.display = "none";
            contentParametre.style.display = "none";
            contentExamens.style.display = "none";
            prescription.style.display = "flex"

            content_click = document.querySelector('#content_search_medicament' + j);
            contentProduits = content_click.getElementsByTagName('td');

            let medicamentForm = document.querySelector('.medicamentForm');
            let lignes = medicamentForm.getElementsByTagName('div')
            let div = document.createElement('div');
            div.className = 'form-inline';
            let id = contentProduits[0].innerText;
            let designationProduits = contentProduits[1].innerText;
            let type = contentProduits[2].innerText;
            let prix = contentProduits[3].innerText;
           
            if (lignes.length == 0) {
                div.innerHTML =
                    `
                        <input type="hidden" name="0[produits_id]" value="`+ id + `" class="form-control" id="id">
                        <input type="text" desabled name="0[designation]" value="`+ designationProduits + `" class="form-control mb-2 mr-1 col-lg-3" id="designationProduits">
                        <input type="text"  name="0[type]" value="`+ type + `" class="form-control mb-2 mr-1 col-lg-3" id="type">
                        <input type="text"  name="0[quantite]" placeholder="quantite" class="form-control mb-2 mr-1 col-lg-2" id="quantite">
                        <input type="text"  name="0[durer]" placeholder="durer" class="form-control mb-2 mr-1 col-lg-2" id="durer">
                        <i id="ligne_0" class="remove mdi mdi-close-circle-outline"></i>
                    `;
                medicamentForm.appendChild(div);
            }
            else if (lignes.length >= 1) {
                for (let i = 0; i < lignes.length; i++) {


                    div.innerHTML =
                        `
                            <input type="hidden" name="`+ i + `[produits_id]" value="` + id + `" class="form-control" id="id">
                            <input type="text" desabled name="`+ i + `[designationProduits]" value="` + designationProduits + `" class="form-control mb-2 mr-1 col-lg-3" id="designationProduits">
                            <input type="text"  name="`+ i + `[type]" value="` + type + `" class="form-control mb-2 mr-1 col-lg-3" id="type">
                            <input type="text"  name="`+ i + `[quantite]" placeholder="quantite" class="form-control mb-2 mr-1 col-lg-2" id="quantite">
                            <input type="text"  name="`+ i + `[durer]" placeholder="durer" class="form-control mb-2 mr-1 col-lg-2" id="durer">
                            <i id="ligne_0" class="remove mdi mdi-close-circle-outline"></i>
                            `;
                    medicamentForm.appendChild(div);
                }
            }

        }, false);

    }
};


function btnvalide() {
    let id = document.getElementById("id");
    let designationProduits = document.getElementById("designationProduits");
    let type = document.getElementById("type");
    let quantite = document.getElementById("quantite");
    let durer = document.getElementById("durer");
    
    const form = document.getElementById('medicamentForm');
    let medicamentForm = document.querySelector('.medicamentForm');
    let ligne = medicamentForm.getElementsByTagName('div');
    
    // remove content and insert new content with number medicament commande

    let content_remove = document.getElementById('medicamentForm');
    content_remove.remove(content_remove);


    var div = document.createElement('div')
    div.id = "formCommande";

    let formLine =  document.getElementById("formLine");
    formLine.appendChild(div);

    let input = document.createElement('input');
    input.value = ligne.length;
    input.type = 'hidden';
    input.name = 'listeMedicaments';
    document.getElementById("formCommande").appendChild(input);

    for (let i = 0; i < ligne.length; i++) {
        console.log(ligne[i])
        let div = document.createElement('div')
        div.id = 'inforMedicament';
        div.className = 'inforMedicament form-inline';
        div.innerHTML = ligne[i].innerHTML;
        document.getElementById("listeMedicamentPrescription").appendChild(div);
        
    }


    let getValue = document.querySelector('.inforMedicament');
    let getInputValue = getValue.getElementsByTagName('input');
    
    for (let li = 0; li < getInputValue.length; li++) {
        const element = getInputValue[li];
        console.log(element.value);
        
    }



    // btnFinished.style.display = 'none';
    // btnreset.style.display = 'none';
    // document.getElementById('btnSaved').style.display = 'block'
}



























function hideShowParamaetre() {
    let showparametre = document.getElementById('parametre');
}




