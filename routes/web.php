<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\MagasinierController;
use App\Http\Controllers\AchatProduitController;
use App\Http\Controllers\BonReceptionController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\CommandeProduitController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\FactureDispensaireController;
use App\Http\Controllers\LivraisonProduitsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\ReceptionisteController;
use App\Http\Controllers\StockPharmacieController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('home/', [HomeController::class, 'index'])->name('home');

####################################################
#  Gestion des Magasins Depots & Produits Medicale #
###################################################
Route::get('administrator/', [PageController::class, 'administrator'])->name('administrator.page');


####################################################
#  Gestion des Magasins Depots & Produits Medicale #
###################################################

Route::get('magasin/depots', [DepotController::class, 'index'])->name('magasin.depots');

// Achats Magasinier

Route::get('Liste/achat_magasinier', [MagasinierController::class, 'index'])->name('index.achat.produits');
Route::get('Magasinier/nouveaux_achat', [MagasinierController::class, 'create'])->name('create.achat.produits');
Route::post('enregistrement/achat/magasinier', [MagasinierController::class, 'store'])->name('store.achat.produits');
Route::get('Liste_achat/validated/{numAchat}', [MagasinierController::class, 'show'])->name('listeAchat.validate');

// Livraison Depots Magasinier

Route::get('Bon_reception/Magasien', [BonReceptionController::class, 'bonReception'])->name('liste.reception');
Route::get('Bon_livraison/details/{num_livraison}/Magasien', [BonReceptionController::class, 'detailLivraison'])->name('detail.livraison');
Route::post('valider/livraison', [BonReceptionController::class, 'updateDepotLiivraison'])->name('valider_livraison.update_depot');

// Enregistre Valide * Commande Pharmacie

Route::get('ListeCommande/Produits', [CommandeProduitController::class, 'index'])->name('commandeAll');
Route::get('ValideCommandes/Magasin', [CommandeProduitController::class, 'create'])->name('create.commande');
Route::post('valideCommandes/Envoyer', [CommandeProduitController::class, 'store'])->name('enregistre.commande');

############################################
#  Gestion de Pharmacie stock & Medicamen  #
############################################

Route::get('pharmacie/stock', [StockPharmacieController::class, 'index'])->name('pharmacie.stock');

// Commandes Medicaments Pharmacie

Route::get('Pharmacie/commande/Medicament', [PharmacienController::class, 'index'])->name('commande.index');

// distribution Medicament 
Route::get('pharmacie/distribution/prescription', [PharmacienController::class, 'listeDistibution'])->name('distribution.prescription');
Route::get('pharmacie/patient_distribuer/{id}', [PharmacienController::class, 'detailsDistribution'])->name('details.patient.distribution');


############################################################
#  Gestion des Produits & Fournisseur Administrator #
###########################################################

Route::get('produits/liste', [ProduitController::class, 'index'])->name('index.produits');                                          
Route::post('produits/store', [ProduitController::class, 'store'])->name('store.produits');                                         


############################################################
#  Gestion des Achats Produits & Fournisseur Administrator #
###########################################################

Route::get('liste/achat', [AchatProduitController::class, 'index'])->name('produits.achat');
Route::get('create/validate_achat/{numAchat}/Produit', [AchatProduitController::class, 'show'])->name('achat.details');
Route::post('update_achat/livrasaion_store', [AchatProduitController::class, 'store'])->name('achat_livraison');
Route::get('details/achat_produits/{numAchat}', [AchatProduitController::class, 'detailsAchat'])->name('liste.achat');

###############################################################
#  Gestion des Livraison Produits & Fournisseur Administrator #
###############################################################

Route::get('liste/Livraison', [LivraisonProduitsController::class, 'index'])->name('All.Livraison');
Route::get('nouveaux/livraison', [LivraisonProduitsController::class, 'create'])->name('createNewLivraison');
Route::post('enregistrement/livraison_fournisseur', [LivraisonProduitsController::class, 'store'])->name('saveLivraison');
// Route::get('Bon_livraison/details/{num_livraison}/Magasien', [BonReceptionController::class, 'detailLivraison'])->name('detail.livraison');
Route::get('details/{num_livraison}/livraison', [LivraisonProduitsController::class, 'show'])->name('livraison.show');

###########################################
#  Gestion des Personnels  #
###########################################

Route::get('listePersonnel', [PersonnelController::class , 'index'])->name('personnel.liste');
Route::get('nouveauxPersonnel', [PersonnelController::class, 'create'])->name('personnel.nouveaux');
Route::post('personnels/store', [PersonnelController::class, 'store'])->name('personnels.store');

###########################################
#  Gestion des Receptioniste Dispensaire  #
###########################################

Route::get('reception/patient', [ReceptionisteController::class, 'patient'])->name('liste.patient');
Route::get('receptioniste/consultation', [ReceptionisteController::class, 'consultation'])->name('liste.consultation');
Route::get('receptioniste/new_consultation', [ReceptionisteController::class, 'createConsultation'])->name('create.consultation');
Route::post('Enregistre_pation/Consultation', [ReceptionisteController::class, 'storeConsultation'])->name('store.consultation');


###########################################
#  Gestion des Medecin Consultation  #
###########################################

Route::get('Medecin/listeConsultation', [ConsultationController::class, 'index'])->name('get.all.consultation');
Route::get('consulted/{id}/patient', [ConsultationController::class, 'consultePatient'])->name('consulte.patient');
Route::post('enregistrer/Consultation', [ConsultationController::class, 'store'])->name('storePatient.consultation');


###########################################
#  Gestion des Payement Patient Caisse    #
###########################################

Route::get('Caisse/payementPatient', [CaisseController::class, 'index'])->name('all.patient.payeable');
Route::post('caisse/enregistremenFacture', [FactureDispensaireController::class, 'store'])->name('enregistrement.Facture');
Route::get('encaissement/journaliere', [caisseController::class, 'encaisseMentJournaliere'])->name('journaliere.encaissement');



###########################################
#  Api for afficher les info in Js     #
###########################################

// Route::get('facture/getAll', [facturePatienApiContronller::class, 'facturePatient'])->name('information.facture.patien');
