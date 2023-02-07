/**
 * function to show new Consultation and hidden Antecedants
 * */
function newConsultation () {
    let medicamentIteam = document.getElementById('listeMedicament');
    let consltationContent = document.getElementById('cardConsultation');

    let antecedantsIteam = document.getElementById('listeAntecedant');
    let cradAntecedants = document.getElementById('cardAntecedant');

    antecedantsIteam.style.display = "none";
    cradAntecedants.style.display = "none";

    medicamentIteam.style.display = "block";
    consltationContent.style.display = "block";


}


function examensConsultation () {
    const contentExamens = document.getElementById("examens");
    const contentParametre = document.getElementById("parametre");
    const contentResultat = document.getElementById("resultatExamens");
    const contentPrescription = document.getElementById("prescription");
    const contentDiagnostic = document.getElementById("diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "none";

    contentResultat.style.display = "none";

    contentExamens.style.display = "flex";
    contentParametre.style.display = "none";
}

function showParametres () {
    const contentExamens = document.getElementById("examens");
    const contentParametre = document.getElementById("parametre");
    const contentResultat = document.getElementById("resultatExamens");
    const contentPrescription = document.getElementById("prescription");
    const contentDiagnostic = document.getElementById("diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "none";

    contentResultat.style.display = "none";

    contentParametre.style.display = "flex";
    contentExamens.style.display = "none";
}

function examensResultaConsultation () {
    const contentExamens = document.getElementById("examens");
    const contentParametre = document.getElementById("parametre");
    const contentResultat = document.getElementById("resultatExamens");
    const contentPrescription = document.getElementById("prescription");
    const contentDiagnostic = document.getElementById("diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "none";

    contentResultat.style.display = "flex";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}

function presciption () {
    const contentExamens = document.getElementById("examens");
    const contentParametre = document.getElementById("parametre");
    const contentResultat = document.getElementById("resultatExamens");
    const contentPrescription = document.getElementById("prescription");
    const contentDiagnostic = document.getElementById("diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "flex";
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}


function presciptionConsultation () {
    const contentExamens = document.getElementById("examens");
    const contentParametre = document.getElementById("parametre");
    const contentResultat = document.getElementById("resultatExamens");
    const contentPrescription = document.getElementById("prescription");
    const contentDiagnostic = document.getElementById("diagnostic");

    contentDiagnostic.style.display = "none";

    contentPrescription.style.display = "flex";
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}


function diagnosticonsultation () {
    const contentExamens = document.getElementById("examens");
    const contentParametre = document.getElementById("parametre");
    const contentResultat = document.getElementById("resultatExamens");
    const contentPrescription = document.getElementById("prescription");
    const contentDiagnostic = document.getElementById("diagnostic");

    contentDiagnostic.style.display = "flex";
    contentPrescription.style.display = "none";
    contentResultat.style.display = "none";
    contentParametre.style.display = "none";
    contentExamens.style.display = "none";
}


/*Antecedants*/

function showAntecedant () {

    let medicamentIteam = document.getElementById('listeMedicament');
    let consltationContent = document.getElementById('cardConsultation');

    let antecedantsIteam = document.getElementById('listeAntecedant');
    let cradAntecedants = document.getElementById('cardAntecedant');

    medicamentIteam.style.display = "none";
    consltationContent.style.display = "none";

    antecedantsIteam.style.display = "block";
    cradAntecedants.style.display = "block";

}
