// Manipulation consultation 
window.onload = () => {
        // Utilisation de const et let
        const medicamentUl = document.getElementById('medicamentUl');
        const lignes = Array.from(medicamentUl.getElementsByTagName('tr'));
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

            const clickContent = document.getElementById('content_search_medicament' + i);
            clickContent.addEventListener('click', function () {
                contentDiagnostic.style.display = "none";
                contentResultat.style.display = "none";
                contentParametre.style.display = "none";
                contentExamens.style.display = "none";
                prescription.style.display = "flex";

                const contentProduits = clickContent.getElementsByTagName('td');
                const medicamentForm = document.querySelector('.medicamentForm');
                const div = document.createElement('div');
                div.className = 'form-inline abotProduits';
                const id = contentProduits[0].innerText;
                const designationProduits = contentProduits[1].innerText;
                const type = contentProduits[2].innerText;
                const prix = contentProduits[3].innerText;

                if (lignes.length == 1) {
                    div.innerHTML = `
                        <input type="hidden" name="0[produits_id]" value="${id}" class="form-control" id="id">
                        <input type="text" name="0[designation]" value="${designationProduits}" class="form-control mb-2 mr-1 col-lg-3" id="designationProduits">
                        <input type="text" name="0[type]" value="${type}" class="form-control mb-2 mr-1 col-lg-3" id="type">
                        <input type="text" name="0[quantite]" placeholder="quantite" class="form-control mb-2 mr-1 col-lg-3" id="quantite">
                    `;
                    medicamentForm.appendChild(div);
                } else {
                    for (let j = 0; j < lignes.length; j++) {
                        div.innerHTML = `
                            <input type="hidden" name="${j}[produits_id]" value="${id}" class="form-control" id="id">
                            <input type="text" name="${j}[designationProduits]" value="${designationProduits}" class="form-control mb-2 mr-1 col-lg-3" id="designationProduits">
                            <input type="text" name="${j}[type]" value="${type}" class="form-control mb-2 mr-1 col-lg-3" id="type">
                            <input type="text" name="${j}[quantite]" placeholder="quantite" class="form-control mb-2 mr-1 col-lg-3" id="quantite">
    
                        `;
                        medicamentForm.appendChild(div);
                    }
                }

            }, false);

        }
};


    function btnvalide() {

        const divs = document.querySelectorAll('#medicamentForm div');
        const listeMedicamentPrescription = document.getElementById('listeMedicamentPrescription');
        const posologie = document.getElementById('posologie');

        // Itérer sur tous les divs et les ajouter à listeMedicamentPrescription
        divs.forEach((div) => {
            listeMedicamentPrescription.appendChild(div);
        });

        // Récupérer les valeurs de tous les champs d'entrée avec un retour à la ligne entre chaque div
        let values = '';
        divs.forEach((div, index) => {
            const inputs = div.querySelectorAll('input');
            inputs.forEach((input, inputIndex) => {
                values += input.value;
                if (inputIndex < inputs.length - 1) {
                    values += ' ';
                }
            });
            if (index < divs.length - 1) {
                values += '\n';
            }
        });

        // Créer une textarea avec les valeurs récupérées
        const textarea = document.createElement('textarea');
        const h4 = document.createElement('h4');
        h4.innerText = "Pologie et conseille"
        textarea.classList.add('form-control');
        textarea.setAttribute('cols', '50');
        textarea.setAttribute('rows', '10');
        textarea.value = values;
        posologie.appendChild(h4);
        posologie.appendChild(textarea);
        console.log(textarea);


    }

    function btnAnnuler() {
        // Récupérer tous les éléments d'entrée du formulaire
        const inputs = document.querySelectorAll('#listeMedicamentPrescription div');
        const div = document.createElement('div');
        const medicamentForm = document.getElementById('medicamentForm');
        const posologie = document.getElementById('posologie');
        const textarea = document.querySelector('textarea');
        const h4 = document.querySelector('h4');
        // Itérer sur tous les champs d'entrée et récupérer leur valeur
        inputs.forEach((div) => {
            console.log(div, 'iii');
            medicamentForm.appendChild(div);
        });
        h4.remove()
        textarea.remove()
    }



    function hideShowParamaetre() {
        let showparametre = document.getElementById('parametre');
    }




