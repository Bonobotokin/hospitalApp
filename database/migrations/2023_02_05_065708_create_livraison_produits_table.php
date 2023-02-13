<?php

use App\Models\Produit;
use App\Models\Fournisseur;
use App\Models\AchatProduit;
use App\Models\Magasinier;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraison_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('num_livraison');
            $table->integer('num_facture');
            $table->foreignIdFor(AchatProduit::class,'numAchat')->nullable();
            $table->string('conditionnement_livraison');
            $table->integer('quantiter_livraison');
            $table->integer('total');
            $table->integer('prix_livraison');
            $table->string('type_livraison');

            $table->foreignIdFor(Produit::class);
            $table->foreignIdFor(Fournisseur::class);
            $table->foreignIdFor(Magasinier::class,'validate_magasinier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livraison_produits');
    }
};
