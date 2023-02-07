<?php

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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('raison_sociale')->nullable();
            $table->string('activite_fournisseur')->nullable();
            $table->string('adresse_fournisseur')->nullable();
            $table->integer('nif_fournisseur')->nullable();
            $table->integer('num_compte_fournisseur')->nullable();
            $table->integer('telephone_fournisseur')->nullable();
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
        Schema::dropIfExists('fournisseurs');
    }
};
