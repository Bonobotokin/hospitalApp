<?php

use App\Models\Magasinier;
use App\Models\Personnel;
use App\Models\Produit;
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
        Schema::create('achat_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('numAchat');
            $table->foreignIdFor(Produit::class);
            $table->foreignIdFor(Magasinier::class, 'demandeur');
            $table->string('conditionnnement_achat');
            $table->integer('quantite_achat');
            $table->integer('prix_achat')->nullable();
            $table->boolean('Isvalide')->default(false);
            $table->foreignIdFor(Personnel::class, 'personnelValidate')->nullable();
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
        Schema::dropIfExists('achat_produits');
    }
};
