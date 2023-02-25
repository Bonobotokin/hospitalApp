
function addMedicammentCommander() {
    let codeProduits = document.getElementById("codeProduits").value;
    let designation = document.getElementById("designation").value;
    let conditionnement = document.getElementById("condiValue").value;
    let quantite = document.getElementById("quantiteValue").value;
    let total = document.getElementById("total").value;
    let observation = document.getElementById('observation').value;
    
    let formCommande = document.querySelector('.formCommande');
    let lignes = formCommande.getElementsByTagName('div');
    let div = document.createElement('div');

    let quantiteStocker = document.getElementById('quantiteValue');
    let quantiteLivrer = document.getElementById('total');
    let btnAdd = document.getElementById('btnAdd');
    let errorCalcule = document.getElementById('errorCalcule');

    let stock = quantiteStocker.value;
    let livrer = quantiteLivrer.value;
    let result = stock - livrer;
    console.log('stok = ' + stock + ' et livrer = ' + livrer);
    console.log(result)
    console.log((livrer >= stock));

    if(result <=  0 )
    {
        console.log('true');
        
        errorCalcule.style.display = "block"
        document.getElementById('btnAdd').setAttribute('disabled','disabled')
        document.getElementById('clickTeminate').setAttribute('style','display:none')
    }
    else if ((result > 0) && (lignes.length == 0)) {
        div.innerHTML = `
            <input type="hidden" name="0[idProduits]" value="${codeProduits}" class="form-control" id="codeProduits">
            <input type="text"  name="0[designation]" value="${designation}" class="form-control mb-2 mr-1 col-lg-3" id="designation">
            <input type="text" name="0[conditionnement]" value="${conditionnement}" class="form-control mb-2 mr-1 col-lg-2" id="conditionnement">
            <input type="text" name="0[quantite]" value="${quantite}" class="form-control mb-2 mr-1 col-lg-2" id="quantite">
            <input type="text" name="0[total]" value="${total}" class="form-control mb-2 mr-1 col-lg-2" id="total">
            <input type="text" name="0[observation]" value="${observation}" class="form-control mb-2 mr-1 col-lg-2" id="observation">
        `;
        
        formCommande.appendChild(div);
    } else {
        for (let i = 0; i < lignes.length; i++) {
            div.innerHTML = `
                <input type="hidden" name="${i}[idProduits]" value="${codeProduits}" class="form-control" id="codeProduits">
                <input type="text"  name="${i}[designation]" value="${designation}" class="form-control mb-2 mr-1 col-lg-3" id="designation">
                <input type="text" name="${i}[conditionnement]" value="${conditionnement}" class="form-control mb-2 mr-1 col-lg-2" id="conditionnement">
                <input type="text" name="${i}[quantite]" value="${quantite}" class="form-control mb-2 mr-1 col-lg-2" id="quantite">
                <input type="text" name="${i}[total]" value="${total}" class="form-control mb-2 mr-1 col-lg-2" id="total">
                <input type="text" name="${i}[observation]" value="${observation}" class="form-control mb-2 mr-1 col-lg-2" id="observation">
            `;
            formCommande.appendChild(div);
        }
    }
    
}
    
function enregistrerCommande() {
    
    let codeProduits = document.getElementById("codeProduits").value;
    let designation = document.getElementById("designation").value;
    let categorieValue = document.getElementById("categorieValue").value;
    let conditionnement = document.getElementById("conditionnement").value;
    let quantite = document.getElementById("quantite").value;
    
    const form = document.getElementById('formCommande');
    let formCommande = document.querySelector('.formCommande');
    let ligne = formCommande.getElementsByTagName('div');
    
    const btnFinished = document.getElementById('btnFinish');
    
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
        document.getElementById("MedecoCommande").appendChild(div);
        
    }
    btnFinished.style.display = 'none';
    document.getElementById("btnSaved").style.display = "block"
    
}
    
 function rafraichir() {

    document.getElementById('errorCalcule').style.display = "none"
    document.getElementById('btnAdd').setAttribute('disabled',' ')
    document.getElementById('clickTeminate').setAttribute('style','display:block')


 }