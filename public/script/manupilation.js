// Manipulation consultation 
window.onload = () => {
	// Utilisation de const et let
	const medicamentUl = document.getElementById('medicamentUl');
	const lignes = medicamentUl.getElementsByTagName('tr');

	const content_remove = medicamentUl.parentNode.removeChild(medicamentUl);
	const tbody = document.createElement('tbody');
	tbody.id = "medicamentUl";
	document.getElementById("tableMedicament").appendChild(tbody);

	// Utilisation de querySelector() pour sélectionner les éléments
	const prescription = document.querySelector('#prescription');
	const contentExamens = document.querySelector("#examens");
	const contentParametre = document.querySelector("#parametre");
	const contentResultat = document.querySelector("#resultatExamens");
	const contentDiagnostic = document.querySelector("#diagnostic");

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


};


function btnvalide() {
	const divs = document.querySelectorAll('#medicamentForm div');
	const listeMedicamentPrescription = document.getElementById('listeMedicamentPrescription');
	const posologie = document.getElementById('posologie');
	const factureMedicament = document.querySelector('#factureMedicament');
	const abotProduits = document.querySelectorAll('#medicamentForm .abotProduits');

	// Itérer sur tous les divs et les ajouter à listeMedicamentPrescription
	divs.forEach((div) => {
		listeMedicamentPrescription.appendChild(div);
	});

	// Récupérer les valeurs de tous les champs d'entrée avec un retour à la ligne entre chaque produit
	let values = '';
	
	abotProduits.forEach((abotProduit, index) => {
		const idInput = abotProduit.querySelector('[name$="[produits_id]"]');
		const designationInput = abotProduit.querySelector('[name$="[designationProduits]"]');
		const prixInput = abotProduit.querySelector('[name$="[prix]"]');

		const quantiteInput = abotProduit.querySelector('[name$="[quantite]"]');
		const id = idInput.value;
		const designationProduits = designationInput.value;
		const quantite = quantiteInput.value;
		const prix = prixInput.value
		values += ` ${id} : ` + ' ' + ` ${designationProduits} ` + ' ' + ` ${quantite} =>`;
		if (index < abotProduits.length - 1) {
			values += '\n';
		}

		// Ajouter les valeurs sélectionnées à la facture
		const tr = document.createElement('tr');
		const tdId = document.createElement('td');
		const tdDesignationProduits = document.createElement('td');
		const tdQuantite = document.createElement('td');
		const tdPrix = document.createElement('td');


		tdId.textContent = id;
		tdDesignationProduits.textContent = designationProduits;
		tdQuantite.textContent = quantite;

		tdPrix.textContent = prix * quantite + 'Ar';
		tdPrix.id = 'prix';

		tr.appendChild(tdDesignationProduits);
		tr.appendChild(tdQuantite);
		tr.appendChild(tdPrix);

		factureMedicament.appendChild(tr);
	});

	// Créer une textarea avec les valeurs récupérées
	const textarea = document.createElement('textarea');
	textarea.classList.add('form-control');
	textarea.setAttribute('cols', '50');
	textarea.setAttribute('rows', '20');
	textarea.value = values;
	textarea.name = 'posologie';
	posologie.appendChild(textarea);

	const prix = document.querySelectorAll('#prix');
	const tFoot = document.getElementById('tFoot');
	const PrixConsultaion = document.getElementById('PrixConsultaion');
	const facturePaye = document.getElementById('facturePaye');
	let totalPrix = 0;

	const input = document.createElement('input');
	input.type = 'hidden';
	input.name = 'nombreMedicament';
	input.value = abotProduits.length;
	posologie.appendChild(input);
	prix.forEach((quantite) => {
		const quantiteValue = parseInt(quantite.textContent.trim());
		if (!isNaN(quantiteValue)) {
			totalPrix += quantiteValue;
		}
	});

	tFoot.textContent = totalPrix;

	facturePaye.value = parseFloat(totalPrix) + parseFloat(PrixConsultaion.textContent);

	console.log(facturePaye);




}

function hideShowParamaetre() {
	let showparametre = document.getElementById('parametre');
}




