window.onload = () => {
    
    const myUL = document.getElementById('myUL');
    let ligne = myUL.getElementsByTagName('tr');
    let content_remove = document.getElementById('myUL');
    content_remove.remove(content_remove);
    var tbody = document.createElement('tbody')
    tbody.id = "myUL";

    document.getElementById("tableCommandeProduits").appendChild(tbody)
    for (let i = 0; i < ligne.length; i++) {

        let tr = document.createElement('tr')
        tr.style.cursor = 'pointer';
        tr.id = 'content_search' + i;
        tr.className = "content_search";
        // tr.setAttribute('onclick','getElement()');
        tr.innerHTML = ligne[i].innerHTML;
        console.log(ligne[i].innerHTML);
        document.getElementById("myUL").appendChild(tr);
    }
    for (let j = 0; j < ligne.length; j++) {
        let clickContent = document.getElementById('content_search' + j);

        clickContent.addEventListener('click', function () { 
            // ajouter les Medicament dans le formulaire
            let content_click, categorie, nom, abrev, idProduits, cardConsultation;

            content_click = document.querySelector('#content_search' + j);
            contentProduits = content_click.getElementsByTagName('td');

            cardConsultation = document.getElementById('cardConsultation');

            categorie = document.getElementById('categorie');
            nom = document.getElementById('nom');
            abrev = document.getElementById('abrev');
            idProduits = document.getElementById('idProduits');

            for (let ul = 0; ul < contentProduits.length; ul++) {

                let id = contentProduits[0].innerText;
                let designationProduits = contentProduits[2].innerText;
                let categorieProdui = contentProduits[1].innerText;
                let abrev = contentProduits[3].innerText;

                document.getElementById("codeProduits").value = id;
                document.getElementById("designation").value = designationProduits;
                document.getElementById("categorieValue").value = categorieProdui;
                document.getElementById("abrev").value = abrev;

            }


        }, false);

    }
};

function addMedicamentBtn() {

    let codeProduits = document.getElementById("codeProduits").value;
    let designation = document.getElementById("designation").value;
    let categorieValue = document.getElementById("categorieValue").value;
    let conditionnement = document.getElementById("conditionnement").value;
    let quantite = document.getElementById("quantite").value;
    let etat = document.getElementById("etat").value;
    let abrev = document.getElementById('abrev').value;
    console.log(codeProduits);
    let formCommande = document.querySelector('.formCommande');
    let lignes = formCommande.getElementsByTagName('div');
    let div = document.createElement('div');
    // console.log(lignes.HTMLCollection)
    if(lignes.length == 0)
    {
        div.innerHTML = 
        `
            <input type="hidden" name="0[idProduits]" value="`+ codeProduits +`" class="form-control" id="`+ codeProduits +`">
            <input type="text" desabled name="0[designation]" value="`+ designation +`" class="form-control mb-2 mr-1 col-lg-3" id="`+ designation +`">
            <input type="text"  name="0[conditionnement]" value="`+ conditionnement +`" class="form-control mb-2 mr-1 col-lg-3" id="`+ conditionnement +`">
            <input type="text"  name="0[quantite]" value="`+ quantite +`" class="form-control mb-2 mr-1 col-lg-3" id="'`+ quantite +`">
            <input type="text" name="0[etat]" value="`+ etat +`" class="form-control mb-2 mr-1 col-lg-2" id="`+ etat +`">
                    
        `;
        formCommande.appendChild(div);
    }
    else if (lignes.length >= 1)
    {
        for (let i = 0; i < lignes.length; i++) 
        {
           

            div.innerHTML = 
                `
                <input type="hidden" name="`+i+`[idProduits]" value="`+ codeProduits +`" class="form-control" id="`+ codeProduits +`">
                <input type="text" desabled name="`+i+`[designation]" value="`+ designation +`" class="form-control mb-2 mr-1 col-lg-3" id="`+ designation +`">
                <input type="text"  name="`+i+`[conditionnement]" value="`+ conditionnement +`" class="form-control mb-2 mr-1 col-lg-3" id="`+ conditionnement +`">
                <input type="text"  name="`+i+`[quantite]" value="`+ quantite +`" class="form-control mb-2 mr-1 col-lg-3" id="'`+ quantite +`">
                <input type="text" name="`+i+`[etat]" value="`+ etat +`" class="form-control mb-2 mr-1 col-lg-2" id="`+ etat +`">
                
                `;
            formCommande.appendChild(div);
        }
    }
    

}

function enregistrerCommande()
{

    let codeProduits = document.getElementById("codeProduits").value;
    let designation = document.getElementById("designation").value;
    let categorieValue = document.getElementById("categorieValue").value;
    let conditionnement = document.getElementById("conditionnement").value;
    let quantite = document.getElementById("quantite").value;
    let etat = document.getElementById("etat").value;

    const form = document.getElementById('formCommande');
    let formCommande = document.querySelector('.formCommande');
    let ligne = formCommande.getElementsByTagName('div');
    
    const btnFinished = document.getElementById('btnFinish');
    const btnSaved = document.getElementById('btnSave');
// remove content and insert new content with number medicament commande
    let content_remove = document.getElementById('formCommande');
    content_remove.remove(content_remove); 

    var div = document.createElement('div')
    div.id = "formCommande";

    document.getElementById("formLine").appendChild(div);
    
    let input = document.createElement('input');
    input.value = ligne.length;
    input.type = 'hidden';
    input.name = 'nombreCommande';
    document.getElementById("formCommande").appendChild(input);

    for (let i = 0; i < ligne.length; i++) {

        let div = document.createElement('div')
        div.id = 'inforMedicamentCommande';
        div.className = 'inforMedicamentCommande form-inline';
        div.innerHTML = ligne[i].innerHTML;
        document.getElementById("formCommande").appendChild(div);
        
    }
    btnFinished.style.display = 'none';
    btnSaved.style.display = 'block';

    
}


function savenedicamentBt()
{

    let codeProduits = document.getElementById("codeProduits").value;
    let designation = document.getElementById("designation").value;
    let categorieValue = document.getElementById("categorieValue").value;
    let conditionnement = document.getElementById("conditionnement").value;
    let quantite = document.getElementById("quantite").value;
    let etat = document.getElementById("etat").value;

    const form = document.getElementById('formCommande');
    let formCommande = document.querySelector('.formCommande');
    let ligne = formCommande.getElementsByTagName('div');
    
    const btnFinished = document.getElementById('btnFinish');
    const btnreset = document.getElementById('btnreset');
// remove content and insert new content with number medicament commande
    let content_remove = document.getElementById('formCommande');
    content_remove.remove(content_remove); 

    var div = document.createElement('div')
    div.id = "formCommande";

    document.getElementById("formLine").appendChild(div);
    
    let input = document.createElement('input');
    input.value = ligne.length;
    input.type = 'hidden';
    input.name = 'nombreCommande';
    document.getElementById("formCommande").appendChild(input);

    for (let i = 0; i < ligne.length; i++) {

        let div = document.createElement('div')
        div.id = 'inforMedicamentCommande';
        div.className = 'inforMedicamentCommande form-inline';
        div.innerHTML = ligne[i].innerHTML;
        document.getElementById("formCommande").appendChild(div);
        
    }
    btnFinished.style.display = 'none';
    btnreset.style.display = 'none';

    
}
