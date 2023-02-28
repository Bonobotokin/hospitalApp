window.onload = () => {
    const prescription = document.querySelector('#prescription');
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentDiagnostic = document.querySelector("#diagnostic");
    if (prescription.innerText == null) {
        const myUL = document.getElementById('myUL');
        const ligne = myUL.getElementsByTagName('tr');
        const content_remove = document.getElementById('myUL');
        content_remove.remove(content_remove);

        const tbody = document.createElement('tbody');
        tbody.id = "myUL";
        document.getElementById("tableCommandeProduits").appendChild(tbody);

        for (let i = 0; i < ligne.length; i++) {
            const tr = document.createElement('tr');
            tr.style.cursor = 'pointer';
            tr.id = 'content_search' + i;
            tr.className = "content_search";
            tr.innerHTML = ligne[i].innerHTML;
            console.log(ligne[i].innerHTML);
            document.getElementById("myUL").appendChild(tr);
        }

        for (let j = 0; j < ligne.length; j++) {
            const clickContent = document.getElementById('content_search' + j);

            clickContent.addEventListener('click', function () {
                // ajouter les Medicament dans le formulaire
                const content_click = document.querySelector('#content_search' + j);
                const contentProduits = content_click.getElementsByTagName('td');
                console.log(contentProduits)
                const codeProduits = document.getElementById("codeProduits");
                const designation = document.getElementById("designation");
                const typeValue = document.getElementById("typeValue");
                const type = document.getElementById("type");
                const condiValue = document.getElementById("condiValue");
                const categorieValue = document.getElementById('categorieValue');
                const quantiteValue = document.getElementById('quantiteValue');


                for (let ul = 0; ul < contentProduits.length; ul++) {
                    console.log(contentProduits[ul].innerText);
                    const id = contentProduits[0].innerText;
                    const designationProduits = contentProduits[1].innerText;
                    const typeProduits = contentProduits[2].innerText;
                    const conditProduits = contentProduits[2].innerText;
                    const quantiteProduits = contentProduits[3].innerText;
                    const categorieProduits = contentProduits[4].innerText;
                    codeProduits.value = id;
                    designation.value = designationProduits;
                    if ((typeValue != null)) {
                        typeValue.value = typeProduits;
                    }
                    else if ((type != null)) {
                        const produitsType = contentProduits[4].innerText;
                        type.value = produitsType;
                    }
                    else if (condiValue != null) {
                        quantiteValue.value = quantiteProduits;
                        condiValue.value = conditProduits;
                        categorieValue.value = categorieProduits;
                    }

                }

            }, false);

        }
    } else {


		const medicamentUl = document.getElementById('medicamentUl');
		const lignes = medicamentUl.getElementsByTagName('tr');

		const content_remove = medicamentUl.parentNode.removeChild(medicamentUl);
		const tbody = document.createElement('tbody');
		tbody.id = "medicamentUl";
		document.getElementById("tableMedicament").appendChild(tbody);

		for (let i = 0; i < lignes.length; i++) {
			const tr = document.createElement('tr');
			tr.style.cursor = 'pointer';
			tr.id = 'content_search_medicament' + i;
			tr.className = "content_search_medicament";
			tr.innerHTML = lignes[i].innerHTML;
			document.getElementById("medicamentUl").appendChild(tr);

		}
		const ulMedicament = document.getElementById('medicamentUl');
		const tableLigne = ulMedicament.getElementsByTagName('tr');
		const medicamentForm = document.querySelector('.medicamentForm');
		let elementCount = 0;

		for (let y = 0; y < tableLigne.length; y++) {
			const clickContent = document.getElementById('content_search_medicament' + y);
			clickContent.addEventListener('click', function () {
				contentDiagnostic.style.display = "none";
				contentResultat.style.display = "none";
				contentParametre.style.display = "none";
				contentExamens.style.display = "none";
				prescription.style.display = "flex";

				const contentProduits = clickContent.getElementsByTagName('td');
				const div = document.createElement('div');
				div.className = 'form-inline abotProduits';
				div.id = 'abotProduits';

				const id = contentProduits[0].innerText;
				const designationProduits = contentProduits[1].innerText;
				const type = contentProduits[2].innerText;
				const prix = contentProduits[3].innerText;

				div.innerHTML = `
				<input type="hidden" name="${elementCount}[produits_id]" value="${id}" class="form-control" id="id">
				<input type="text" name="${elementCount}[designationProduits]" value="${designationProduits}" class="form-control mb-2 mr-1 col-lg-3" id="designationProduits">
				<input type="text" name="${elementCount}[type]" value="${type}" class="form-control mb-2 mr-1 col-lg-3" id="type">
				<input type="hidden" name="${elementCount}[prix]" value="${prix}" class="form-control mb-2 mr-1 col-lg-2" id="prix">
				<input type="text" name="${elementCount}[quantite]" placeholder="quantite" class="form-control mb-2 mr-1 col-lg-3" id="quantite">
				`;
				medicamentForm.appendChild(div);
				elementCount++;
				const numElements = elementCount;
				console.log(numElements)
			}, false);
		}

	}
};




function addMedicamentBtn() {

    let formCommande = document.querySelector('.formCommande');
    let lignes = formCommande.getElementsByTagName('div');
    let div = document.createElement('div');

    let idProduits = document.getElementById("codeProduits").value;
    let nomProduits = document.getElementById("designation").value;
    let condit = document.getElementById("conditionnement").value;
    let quantiteAchat = document.getElementById("quantite").value;



    document.getElementById("codeProduits").value = "";
    document.getElementById("designation").value = "";
    document.getElementById("typeValue").value = "";
    document.getElementById("conditionnement").value = "";
    document.getElementById("quantite").value = "";

    if (lignes.length === 0) {
        div.innerHTML = `
        <input type="hidden" name="0[produits_id]" value="${idProduits}" class="form-control" id="codeProduits">
        <input type="text" name="0[designation]" value="${nomProduits}" class="form-control mb-2 mr-1 col-lg-4" id="designation">
        <input type="text" name="0[conditionnement]" value="${condit}" class="form-control mb-2 mr-1 col-lg-4" id="conditionnement">
        <input type="text" name="0[quantiteAchat]" value="${quantiteAchat}" class="form-control mb-2 mr-1 col-lg-3" id="quantiteAchat">
    `;
        formCommande.appendChild(div);
    } else if (lignes.length >= 1) {
        for (let i = 0; i < lignes.length; i++) {
            div.innerHTML = `
            <input type="hidden" name="${i}[produits_id]" value="${idProduits}" class="form-control" id="codeProduits">
            <input type="text" name="${i}[designation]" value="${nomProduits}" class="form-control mb-2 mr-1 col-lg-4" id="designation">
            <input type="text" name="${i}[conditionnement]" value="${condit}" class="form-control mb-2 mr-1 col-lg-4" id="conditionnement">
            <input type="text" name="${i}[quantiteAchat]" value="${quantiteAchat}" class="form-control mb-2 mr-1 col-lg-3" id="quantite">
        `;
            formCommande.appendChild(div);
        }
    }



}
function savenedicamentBt() {
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
    input.name = 'listeAchat';
    document.getElementById("formCommande").appendChild(input);

    for (let i = 0; i < ligne.length; i++) {

        let div = document.createElement('div')
        div.id = 'inforMedicamentCommande';
        div.className = 'inforMedicamentCommande form-inline';
        div.innerHTML = ligne[i].innerHTML;
        document.getElementById("achatMedoc").appendChild(div);

    }
    btnFinished.style.display = 'none';
    btnreset.style.display = 'none';
    document.getElementById('btnSaved').style.display = 'block'


}