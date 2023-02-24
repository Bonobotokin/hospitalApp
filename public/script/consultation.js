/**
 * function to show new Consultation and hidden Antecedants
 * */
function newConsultation () {
    let medicamentIteam = document.querySelector('listeMedicament');
    let consltationContent = document.querySelector('cardConsultation');

    let antecedantsIteam = document.querySelector('listeAntecedant');
    let cradAntecedants = document.querySelector('cardAntecedant');

    antecedantsIteam.style.display = "none";
    cradAntecedants.style.display = "none";

    medicamentIteam.style.display = "block";
    consltationContent.style.display = "block";


}


function examensConsultation () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");
    const facture = document.querySelector("#facture");

    contentDiagnostic.style.display = "none";
    facture.style.display = "none";
    contentPrescription.style.display = "none";

    contentResultat.style.display = "none";

    contentExamens.style.display = "flex";
    contentParametre.style.display = "none";
}

function showParametres () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");
    const facture = document.querySelector("#facture");

    contentDiagnostic.style.display = "none";
    facture.style.display = "none";
    contentPrescription.style.display = "none";

    contentResultat.style.display = "none";

    contentParametre.style.display = "flex";
    contentExamens.style.display = "none";
}

function examensResultaConsultation () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");
    const facture = document.querySelector("#facture");

    contentDiagnostic.style.display = "none";
    facture.style.display = "none";
    contentPrescription.style.display = "none";

    contentResultat.style.display = "flex";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}

function presciption () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "flex";
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}


function presciptionConsultation () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "flex";
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}

function facturationConsultation () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");
    const facture = document.querySelector('#facture');

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "none";
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
    facture.style.display = "flex";
}





function diagnosticonsultation () {
    const contentExamens = document.querySelector("#examens");
    const contentParametre = document.querySelector("#parametre");
    const contentResultat = document.querySelector("#resultatExamens");
    const contentPrescription = document.querySelector("#prescription");
    const contentDiagnostic = document.querySelector("#diagnostic");
    const facture = document.querySelector("#facture");

    contentDiagnostic.style.display = "flex";
    contentPrescription.style.display = "none";
    facture.style.display = "none"
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}


/*Antecedants*/

function showAntecedant () {

    let medicamentIteam = document.querySelector('listeMedicament');
    let consltationContent = document.querySelector('cardConsultation');

    let antecedantsIteam = document.querySelector('listeAntecedant');
    let cradAntecedants = document.querySelector('cardAntecedant');

    medicamentIteam.style.display = "none";
    consltationContent.style.display = "none";

    antecedantsIteam.style.display = "block";
    cradAntecedants.style.display = "block";

}
