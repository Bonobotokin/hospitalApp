<?php

use App\Models\Magasinier;
use App\Models\Pharmacien;
use App\Models\Produit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produit::class);
            $table->string('conditionnement_commande');
            $table->integer('qunantite_commande');
            $table->string('observetion');
            $table->foreignIdFor(Pharmacien::class);
            $table->foreignIdFor(Magasinier::class);
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
        Schema::dropIfExists('commande_produits');
    }
};
