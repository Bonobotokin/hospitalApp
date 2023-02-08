<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\MagasinierController;
use App\Http\Controllers\AchatProduitController;
use App\Http\Controllers\BonReceptionController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\LivraisonProduitsController;
use App\Models\LivraisonProduits;

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

Route::get('produits/liste', [ProduitController::class, 'index'])->name('index.produits');                                          #
Route::post('produits/store', [ProduitController::class, 'store'])->name('store.produits');                                         #
Route::get('magasin/depots', [DepotController::class, 'index'])->name('depots');

// Achats Magasinier

Route::get('Liste/achat_magasinier', [MagasinierController::class, 'index'])->name('index.achat.produits');
Route::get('Magasinier/nouveaux_achat', [MagasinierController::class, 'create'])->name('create.achat.produits');
Route::post('enregistrement/achat/magasinier', [MagasinierController::class, 'store'])->name('store.achat.produits');
Route::get('Liste_achat/validated/{numAchat}', [MagasinierController::class, 'show'])->name('listeAchat.validate');

// Livraison Depots Magasinier

Route::get('Bon_reception/Magasien', [BonReceptionController::class, 'bonReception'])->name('liste.reception');
Route::get('Bon_livraison/details/{num_livraison}/Magasien', [BonReceptionController::class, 'detailLivraison'])->name('detail.livraison');
Route::post('valider/livraison', [BonReceptionController::class, 'updateDepotLiivraison'])->name('valider_livraison.update_depot');

############################################################
#  Gestion des Achats Produits & Fournisseur Administrator #
###########################################################

Route::get('liste/achat', [AchatProduitController::class, 'index'])->name('produits.achat');
Route::get('create/validate_achat/{numAchat}/Produit', [AchatProduitController::class, 'show'])->name('achat.details');
Route::post('update_achat/livrasaion_store', [AchatProduitController::class, 'store'])->name('achat_livraison');
Route::get('details/achat_produits/{numAchat}', [AchatProduitController::class, 'detailsAchat'])->name('liste.achat');

###############################################################
#  Gestion des Livraison Produits & Fournisseur Administrator #
##############################################################

Route::get('liste/Livraison', [LivraisonProduitsController::class, 'index'])->name('All.Livraison');
Route::get('nouveaux/livraison', [LivraisonProduitsController::class, 'create'])->name('createNewLivraison');
Route::post('enregistrement/livraison_fournisseur', [LivraisonProduitsController::class, 'store'])->name('saveLivraison');
// Route::get('Bon_livraison/details/{num_livraison}/Magasien', [BonReceptionController::class, 'detailLivraison'])->name('detail.livraison');
Route::get('details/{num_livraison}/livraison', [LivraisonProduitsController::class, 'show'])->name('livraison.show');